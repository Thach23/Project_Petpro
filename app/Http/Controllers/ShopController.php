<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Services\IService\IProductsService;
use App\Services\IService\IOrdersService;
use App\Services\IService\IOrderItemService;
use App\Services\IService\IMailService;
use App\Services\IService\ICommentsService;
use App\Services\IService\IProductAttributesService;
use App\Services\IService\IProductAttributeMappingsService;
use App\Services\IService\IProductTagMappingService;
use App\Services\IService\ITagsService;
use App\Services\IService\IProductCategoriesService;
use App\Services\IService\IWebsiteAttributesService;
use App\Services\IService\IProductPictureMappingsService;
use App\Services\IService\IBlogsService;
use App\Services\IService\IPicturesService;
use Carbon\Carbon;
use datetime;
use Illuminate\Support\Facades\URL;
use App\Models\PRODUCTS;
use App\Models\PRODUCTCATEGORIES;
use App\Models\COMMENTS;
use Google\Service\AlertCenter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Google\Service\AlertCenter\Resource\Alerts;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Factory;
use App\Http\Controllers\length;
use App\Http\Controllers\ShareButtons;
use Illuminate\Support\Str;
use Serializable;

class ShopController extends Controller
{
    protected $_productsService;
    protected $_ordersService;
    protected $_mailService;
    protected $_commentsService;
    protected $_productattributeService;
    protected $_productattributeMappingService;
    protected $_productpictureMappingService;
    protected $_websiteAttributeService;
    protected $_producttagmappingService;
    protected $_tagsService;
    protected $_blogsService;
    protected $_productcategoriesService;
    protected $_picturesService;
    protected $_orderItemService;


    public function __construct(IOrderItemService $orderItemService, IPicturesService $picturesService, IProductPictureMappingsService $productpictureMappingService, IWebsiteAttributesService $websiteAttributeService, IBlogsService $blogsService, IProductCategoriesService $productcategoriesService, IProductsService $productsService, IOrdersService $orderService, ITagsService $tagsService, IMailService $mailService, ICommentsService $commentsService, IProductAttributesService $productattributeService, IProductAttributeMappingsService $productattributeMappingService, IProductTagMappingService $producttagmappingService)
    {
        $this->_productsService = $productsService;
        $this->_ordersService = $orderService;
        // $this->_orderItemsService = $orderItemsService;
        $this->_mailService = $mailService;
        $this->_commentsService = $commentsService;
        $this->_productattributeService = $productattributeService;
        $this->_productattributeMappingService = $productattributeMappingService;
        $this->_producttagmappingService = $producttagmappingService;
        $this->_tagsService = $tagsService;
        $this->_productcategoriesService = $productcategoriesService;
        $this->_blogsService = $blogsService;
        $this->_websiteAttributeService = $websiteAttributeService;
        $this->_productpictureMappingService = $productpictureMappingService;
        $this->_picturesService = $picturesService;
        $this->_orderItemService = $orderItemService;
    }

    //----------------------------------------------------------------------------------------------
    //Action load danh s??ch comments
    public function loadComment($Id)
    {
        // $comments =  $this->_commentsService->query([['BlogId', $request->id], ['isBlog', true]]);
        $comments = COMMENTS::where([['BlogId', $Id], ['isBlog', false], ['Deleted', false]])->paginate(5);

        foreach ($comments as $item) {
            //C???t chu???i l???y ng??y/th??ng/n??m
            $split = explode(' ', $item->DateCreate);
            $dmy = $split[0];
            $time = substr($split[1], 0, 5);
            $item->DateCreate = $dmy . ' ' . $time;

            //???n t??n ng?????i d??ng
            $temp = "";
            for ($i = 0; $i < strlen($item->UserName) - 2; $i++) {
                $temp = $temp . "*";
            }
            $item->UserName = substr($item->UserName, 0, 1) . $temp . substr($item->UserName, strlen($item->UserName) - 1, 1);
        }

        $commentpartial = view('Partital_Share.CommentPartial', compact('comments'))->render();

        // return response()->json([
        //     'commentpartial' => $commentpartial,
        //     'message' => 'Th??nh c??ng',
        //     'code' => 200
        // ], 200);
        return $commentpartial;
    }

    //Action ????ng b??nh lu???n
    public function upComment($request)
    {

        $comment = $request->Cmt_User;
        if ($request->Cmt_User == null) {
            $comment = " ";
        }

        //L??u th??ng tin b??nh lu???n
        $data = [
            'BlogId' => $request->Id_Blog,
            'UserId' => 0,
            'UserName' => $request->Name_User,
            'Content' => $comment,
            'Deleted' => 0,
            'DateCreate' => $date = Carbon::now(),
            'CommentID' => null,
            'isBlog' => $request->isBlog,
        ];

        //L??u b??nh lu???n v??o database
        $create = $this->_commentsService->create($data);

        //L???y danh s??ch b??nh lu???n
        $comments = COMMENTS::where([['BlogId', $request->Id_Blog], ['isBlog', false], ['Deleted', false]])->paginate(5);

        foreach ($comments as $item) {
            //C???t chu???i l???y ng??y/th??ng/n??m
            $split = explode(' ', $item->DateCreate);
            $dmy = $split[0];
            $time = substr($split[1], 0, 5);
            $item->DateCreate = $dmy . ' ' . $time;

            //???n t??n ng?????i d??ng
            $temp = "";
            for ($i = 0; $i < $request->Name_User_Length - 2; $i++) {
                $temp = $temp . "*";
            }
            $item->UserName = substr($item->UserName, 0, 1) . $temp . substr($item->UserName, strlen($item->UserName) - 1, 1);
        }
        $commentpartial = view('Partital_Share.CommentPartial', compact('comments'))->render();

        // return response()->json([
        //     'commentpartial' => $commentpartial,
        //     'message' => 'Th??nh c??ng',
        //     'code' => 200
        // ], 200);
        return $commentpartial;
    }

    //Ph??n trang
    public function paginate_($items, $Slug, $perPage = 12, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url($Slug)]); // 'shop/tim-kiem'
    }

    //L???y Q&A
    public function getQuestAndAnswer($key)
    {
        $webAtribute = $this->_websiteAttributeService->query([['Type', $key]]);
        $arr = [];
        foreach ($webAtribute as $val) {
            //Thay ???????ng d???n ???nh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            if (str::contains($val->Description, 'quest') == true || str::contains($val->Description, 'answer') == true) {
                $arr[] = $val;
            }
        }
        return $arr;
    }


    //Trang Shop theo th??? lo???i
    public function ShopHome($Slug, Request $request)
    {
        //L???y Q&A
        $QNA = $this->getQuestAndAnswer('Shop');

        //L???y Url 
        $currentURL = $request->fullUrl();

        //L???y th??? lo???i s???n ph???m
        $CategoryProd = $this->_productcategoriesService->query([['Slug', $Slug]]);
        $slugCategory = $CategoryProd[0]->Name;
        $env = env('URLIMAGE');

        //L???y s???n ph???m theo th??? lo???i
        $data = $this->_productsService->query([['ProductCategoryId', $CategoryProd[0]->Id], ['Deleted', false], ['IsPublic', true]])->sortbydesc('DateCreated');
        $data = $this->paginate_($data, $currentURL);

        foreach ($data as $val) {

            //Thay ???????ng d???n ???nh
            $val->ProductImage = $env . $val->ProductImage;
            if ($val->ProductImage == $env) {
                $val->ProductImage = null;
            }

            //C???t chu???i l???y ng??y/th??ng/n??m
            $split = explode(" ", $val->DateCreated);
            $day = $split[0];
            $day = str_replace('-', '/', $day);
            $date = Carbon::createFromFormat('Y/m/d', $day);
            $monthName = $date->format('F');

            //L???y ng??y
            $day_split = explode("/", $day);

            //G??n th??m 2 gi?? tr??? ng??y v?? th??ng cho Blog
            $val['month'] = $monthName;
            $val['day'] = $day_split[count($day_split) - 1];

            //L???y t??n s???n ph???m
            $split_content = explode("|", $val->Name);
            $val->Name = $split_content[0];

            //L???y mapping picture c???a s???n ph???m
            $productPictureMapping_ = $this->_productpictureMappingService->query([['ProductId', $val->Id]]);
            $listpictureMapping_ = [];
            foreach ($productPictureMapping_ as $item) {
                //L???y picture theo Id
                $picture = $this->_picturesService->query([['Id', $item->PictureId]]);

                //Thay ???????ng d???n ???nh
                $picture[0]->Url = $env . $picture[0]->Url;

                //L??u v??o array
                $listpictureMapping_[] = $picture[0];
            }

            //L???y url ???nh ?????i di???n s???n ph???m
            if (count($listpictureMapping_) != 0) {
                if ($listpictureMapping_[0]->Url == $env) {
                    $val->ProductImage = null;
                } else {
                    $val->ProductImage = $listpictureMapping_[0]->Url;
                }
            }
        }

        //L???y website attribute 
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay ???????ng d???n ???nh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }


        //L??u meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data_ = [
            'slugCategory' => $slugCategory,
            'Meta' => $Meta,
            'key' => '',
            'QNA' => $QNA,
            'products' => $data,
        ];

        return view('Shop.ShopHome')->with($data_);
    }

    //Trang Shop t???ng
    public function ShopCategory()
    {
        //L???y c??c th??? lo???i c?? v??? tr?? 10
        $ProductCategories = PRODUCTCATEGORIES::where([['Position', '10']])->get();

        //L???y Q&A
        $QNA = $this->getQuestAndAnswer('Shop');
        $env = env('URLIMAGE');

        //L???y c??c s???n ph???m theo t???ng th??? lo???i
        $DsProDuct = [];
        for ($i = 10; $i <= 17; $i++) {

            //L???y s???n ph???m theo th??? lo???i
            $products = $this->_productsService->query([['ProductCategoryId', '=', $i], ['Deleted', false]])->sortbydesc('DateCreated')->take(3);
            foreach ($products as $val) {

                //Thay ???????ng d???n ???nh
                $val->ProductImage = $env . $val->ProductImage;
                if ($val->ProductImage == $env) {
                    $val->ProductImage = null;
                }

                //C???t chu???i l???y ng??y/th??ng/n??m
                $split = explode(" ", $val->DateCreated);
                $day = $split[0];
                $day = str_replace('-', '/', $day);
                $date = Carbon::createFromFormat('Y/m/d', $day);
                $monthName = $date->format('F');

                //L???y ng??y
                $day_split = explode("/", $day);

                //G??n th??m 2 gi?? tr??? ng??y v?? th??ng cho Blog
                $val['month'] = $monthName;
                $val['day'] = $day_split[count($day_split) - 1];

                //L???y t??n s???n ph???m
                $split_content = explode("|", $val->Name);
                $val->Name = $split_content[0];

                //L??u s???n ph???m v??o array
                $DsProDuct[] = $val;
            }
        }

        //L???y website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay ???????ng d???n ???nh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //L??u meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data_ = [
            'ProductCategories' => $ProductCategories,
            'QNA' => $QNA,
            'Meta' => $Meta,
            'DsProDuct' => $DsProDuct,
            'key' => '',
        ];

        return view('Shop.ShopCategory')->with($data_);
    }

    //T??m ki???m s???n ph???m
    public function ShopSearch(Request $request)
    {
        //Lay url
        $currentURL = $request->fullUrl();
        //Lay key search
        $search = $request->input('key');
        $index = 0;
        //Lay Q&A
        $QNA = $this->getQuestAndAnswer('Shop');
        $env = env('URLIMAGE');

        //T??m ki???m s???n ph???m
        $listProducts = [];
        for ($i = 10; $i <= 17; $i++) {
            $list = PRODUCTS::where([['Name', 'like', '%' . $search . '%'], ['Deleted', false], ['ProductCategoryId', '=', $i], ['IsPublic', true]])
                ->orwhere([['Content', 'like', '%' . $search . '%'], ['Deleted', false], ['ProductCategoryId', '=', $i], ['IsPublic', true]])
                ->orwhere([['Description', 'like', '%' . $search . '%'], ['Deleted', false], ['ProductCategoryId', '=', $i], ['IsPublic', true]])->get();

            foreach ($list as $item) {
                $listProducts[] = $item;
            }
        }

        foreach ($listProducts as $val) {
            //C???t chu???i l???y ng??y/th??ng/n??m
            $split = explode(" ", $val->DateCreated);
            $day = $split[0];
            $day = str_replace('-', '/', $day);
            $date = Carbon::createFromFormat('Y/m/d', $day);
            $monthName = $date->format('F');

            //L???y ng??y
            $day_split = explode("/", $day);

            //G??n th??m 2 gi?? tr??? ng??y v?? th??ng cho Blog
            $val['month'] = $monthName;
            $val['day'] = $day_split[count($day_split) - 1];

            //L???y t??n s???n ph???m
            $split_content = explode("|", $val->Name);
            $val->Name = $split_content[0];

            //Thay ???????ng d???n ???nh
            $val->ProductImage = $env . $val->ProductImage;
            if ($val->ProductImage == $env) {
                $val->ProductImage = null;
            }
        }

        //?????i array sang collection v?? s???p x???p theo ng??y t???o r???i ph??n trang
        $listProducts = (new Collection($listProducts));
        $listProducts = $listProducts->sortbydesc('DateCreated');
        $listProducts = $this->paginate_($listProducts, $currentURL);

        //L???y website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay ???????ng d???n ???nh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //L??u meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'Meta' => $Meta,
            'products' => $listProducts,
            'key' => $search,
            'QNA' => $QNA,
        ];
        return view('Shop.ShopSearch')->with($data);
    }

    public function ShopDetail($Slug, Request $request)
    {
        //L???y s???n ph???m theo Slug
        $products = $this->_productsService->query([['Slug', $Slug], ['Deleted', false]], 1);

        //L???y th??? loai s???n ph???m
        $CategoryProduct = $this->_productcategoriesService->query([['Id', $products[0]->ProductCategoryId]]);

        //L???y Q&A
        $QNA = $this->getQuestAndAnswer('Shop');
        $env = env('URLIMAGE');

        //Th??m class cho n???i dung
        $products[0]->Content = str_replace('src="/', 'src="' . $env . ('/'), $products[0]->Content);
        $products[0]->Content = str_replace('<img ', '<img style="width:100%; height:auto;"', $products[0]->Content);

        //L???y mapping thu???c t??nh s???n ph???m
        $ProductAttribute = $this->_productattributeMappingService->query([['ProductId', $products[0]->Id]]);

        //Thay ???????ng d???n ???nh
        $products[0]->ProductImage = $env . $products[0]->ProductImage;
        if ($products[0]->ProductImage == $env) {
            $products[0]->ProductImage = null;
        }

        //N???u c?? ??t nh???t 1 thu???c t??nh th?? d??ng thu???c t??nh ?????u ti??n l??m gi?? s???n ph???m kh??ng th?? hi???n th??? theo m???c ??inh
        if (count($ProductAttribute) > 0) {
            $products[0]->Price = $ProductAttribute[0]->Price;
        }

        //l???y picture mapping c???a s???n ph???m
        $productPictureMapping = $this->_productpictureMappingService->query([['ProductId', $products[0]->Id]]);
        $listpictureMapping = [];
        foreach ($productPictureMapping as $item) {
            //L???y picture theo Id
            $picture = $this->_picturesService->query([['Id', $item->PictureId]]);

            //Thay ???????ng d???n ???nh
            $picture[0]->Url = $env . $picture[0]->Url;
            if ($picture[0]->Url == $env) {
                $picture[0]->Url = null;
            }
            $listpictureMapping[] = $picture[0];
        }

        //L???y s???n ph???m li??n quan
        $products_Lienquan = $this->_productsService->query([['ProductCategoryId', $products[0]->ProductCategoryId], ['Deleted', false], ['Id', '!=', $products[0]->Id]])->sortbydesc('DateCreated')->take(3); //
        foreach ($products_Lienquan as $val) {
            //Thay ???????ng d???n ???nh
            $val->ProductImage = $env . $val->ProductImage;
            if ($val->ProductImage == $env) {
                $val->ProductImage = null;
            }
        }

        //X??? l?? ng??y th??ng n??m
        $final_result = '';
        $split = explode(" ", $products[0]->DateCreated);
        $day = $split[0];
        $day = str_replace('-', '/', $day);
        $date = Carbon::createFromFormat('Y/m/d', $day);
        $monthName = $date->format('F');
        $monthName = substr($monthName, 0, 3);

        //L???y ng??y
        $day_split = explode("/", $day);
        $products[0]->DateCreated = $monthName . ' ' . $day_split[2] . ',' . $day_split[0];

        //L???y danh s??ch b??nh lu???n
        $comments = COMMENTS::where([['BlogId', $products[0]->Id], ['isBlog', false]])->paginate(5);
        foreach ($comments as $item) {
            //C???t chu???i l???y ng??y/th??ng/n??m
            $split = explode(' ', $item->DateCreate);
            $dmy = $split[0];
            $time = substr($split[1], 0, 5);
            $item->DateCreate = $dmy . ' ' . $time;

            //???n t??n ng?????i d??ng
            $temp = "";
            for ($i = 0; $i < strlen($item->UserName) - 2; $i++) {
                $temp = $temp . "*";
            }
            $item->UserName = substr($item->UserName, 0, 1) . $temp . substr($item->UserName, strlen($item->UserName) - 1, 1);
        }

        //X??? l?? ajax b??nh lu???n
        if ($request->ajax()) {

            if ($request->up == true) {

                $commentpartial = $this->upComment($request);
                return response()->json([
                    'commentpartial' => $commentpartial,
                    'message' => 'Th??nh c??ng',
                    'code' => 200
                ], 200);
            }

            $commentpartial = $this->loadComment($products[0]->Id);
            return response()->json([
                'commentpartial' => $commentpartial,
                'message' => 'Th??nh c??ng',
                'code' => 200
            ], 200);
        }

        //L??u meta web
        $Meta['collection'] = null;
        $Meta['blog'] = $products[0];

        $data = [
            'QNA' => $QNA,
            'Meta' => $Meta,
            'products' => $products[0],
            'key' => '',
            'CategoryProduct' => $CategoryProduct[0],
            'products_Lienquan' => null,
            'comments' => $comments,
            'ProductAttribute' => $ProductAttribute,
            'products_Lienquan' => $products_Lienquan,
            'listpictureMapping' => $listpictureMapping,
        ];

        return view('Shop.ShopDetail')->with($data);
    }

    public function ShopConfirm(request $request)
    {
        //L??u th??ng tin ????n h??ng
        $order = [
            'CustomerName' => $request->name,
            'CustomerAddress' => null,
            'CustomerPhone' => $request->phone,
            'CustomerEmail' => null,
            'OrderTotal' => $request->Quantity_Prod * $request->value_price,
            'Deleted' => 0,
            'DateCreated' => $date = Carbon::now(),
            'Note' => null,
            'ProfileId' => null,
        ];

        //T???o ????n h??ng
        $createOrder = $this->_ordersService->create($order);

        //Ki???m tra thu???c t??nh s???n ph???m
        $idAttr = "";
        $getNameAttribute = "";
        if ($request->Id_Attr == -1) {
            $idAttr = null;
            $getNameAttribute = null;
        } else {
            //Id thu???c t??nh g???i v???
            $idAttr = $request->Id_Attr;

            //L???y ra mapping thu???c t??nh theo id
            $attributeMapping = $this->_productattributeMappingService->query([['Id', $request->Id_Attr]]);

            //L???y ra thu???c t??nh theo id
            $attribute = $this->_productattributeService->query([['Id', $attributeMapping[0]->ProductAttributeId]]);

            //L???y t??n thu???c t??nh
            $getNameAttribute = $attribute[0]->Description;
        }

        //L??u th??ng tin chi ti???t ????n h??ng
        $orderitem = [
            'OrderId' => $createOrder->Id,
            'ProductId' => $request->Id_Prod,
            'Quantity' => $request->Quantity_Prod,
            'Price' => $request->value_price,
            'Discount' => null,
            'AttributeId' =>  $idAttr,
            'Temp_1' => null,
            'Temp_2' => null,
            'Temp_3' => null,
            'AttributeName' => $getNameAttribute,
        ];

        //T???o chi ti???t ????n h??ng
        $createOrderItem = $this->_orderItemService->create($orderitem);

        //L???y mail
        $Atribute = $this->_websiteAttributeService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'email']]);

        //L???y mail bcc
        $AtributeMailBcc = $this->_websiteAttributeService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'mail_bcc']]);

        //Ki???m tra mail
        $mail = $Atribute[0]->Value;
        $mailBcc = $AtributeMailBcc[0]->Value;
        if ($mailBcc == null || $mailBcc == '') {
            $mailBcc = $mail;
        }

        //Luu th??ng tin cho g???i mail
        $valueRequest = [];
        $valueRequest['name'] = $request->name;
        $valueRequest['phone'] = $request->phone;
        $valueRequest['total'] = number_format($request->Quantity_Prod * $request->value_price, 0, '', '.');
        $prd = $this->_productsService->query([['Id', $request->Id_Prod], ['Deleted', false]], 1);
        $valueRequest['nameprod'] = $prd[0]->Name;
        $date_ = Carbon::now();
        $split_datetime = explode(" ", $date_->toDateTimeString());
        $split_date = explode("-", $split_datetime[0]);
        $valueRequest['date'] = $split_date[2] . "/" . $split_date[1] . "/" . $split_date[0];

        //G???i mail
        if ($mail != null || $mail != '') {
            $message = view('Shop.MailXacNhan', ['valueRequest' => $valueRequest])->render();
            $this->_mailService->SendMail('B???nh vi???n Th?? Y PetPro', $mail, 'Th??ng b??o ?????t h??ng', $message, $mailBcc);
        }

        //L???y Q&A
        $QNA = $this->getQuestAndAnswer('Shop');

        //L???y website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay ???????ng d???n ???nh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            //Luu meta title m???i
            if ($val->Description == 'title') {
                $val->Value = 'X??c nh???n ?????t h??ng th??nh c??ng';
            }
        }

        //L??u meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'QNA' => $QNA,
            'Meta' => $Meta,
        ];
        return view('Shop.ShopConfirm')->with($data);
    }
}
