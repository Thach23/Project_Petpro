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
    //Action load danh sách comments
    public function loadComment($Id)
    {
        // $comments =  $this->_commentsService->query([['BlogId', $request->id], ['isBlog', true]]);
        $comments = COMMENTS::where([['BlogId', $Id], ['isBlog', false], ['Deleted', false]])->paginate(5);

        foreach ($comments as $item) {
            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $item->DateCreate);
            $dmy = $split[0];
            $time = substr($split[1], 0, 5);
            $item->DateCreate = $dmy . ' ' . $time;

            //Ẩn tên người dùng
            $temp = "";
            for ($i = 0; $i < strlen($item->UserName) - 2; $i++) {
                $temp = $temp . "*";
            }
            $item->UserName = substr($item->UserName, 0, 1) . $temp . substr($item->UserName, strlen($item->UserName) - 1, 1);
        }

        $commentpartial = view('Partital_Share.CommentPartial', compact('comments'))->render();

        // return response()->json([
        //     'commentpartial' => $commentpartial,
        //     'message' => 'Thành công',
        //     'code' => 200
        // ], 200);
        return $commentpartial;
    }

    //Action đăng bình luận
    public function upComment($request)
    {

        $comment = $request->Cmt_User;
        if ($request->Cmt_User == null) {
            $comment = " ";
        }

        //Lưu thông tin bình luận
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

        //Lưu bình luận vào database
        $create = $this->_commentsService->create($data);

        //Lấy danh sách bình luận
        $comments = COMMENTS::where([['BlogId', $request->Id_Blog], ['isBlog', false], ['Deleted', false]])->paginate(5);

        foreach ($comments as $item) {
            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $item->DateCreate);
            $dmy = $split[0];
            $time = substr($split[1], 0, 5);
            $item->DateCreate = $dmy . ' ' . $time;

            //Ẩn tên người dùng
            $temp = "";
            for ($i = 0; $i < $request->Name_User_Length - 2; $i++) {
                $temp = $temp . "*";
            }
            $item->UserName = substr($item->UserName, 0, 1) . $temp . substr($item->UserName, strlen($item->UserName) - 1, 1);
        }
        $commentpartial = view('Partital_Share.CommentPartial', compact('comments'))->render();

        // return response()->json([
        //     'commentpartial' => $commentpartial,
        //     'message' => 'Thành công',
        //     'code' => 200
        // ], 200);
        return $commentpartial;
    }

    //Phân trang
    public function paginate_($items, $Slug, $perPage = 12, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url($Slug)]); // 'shop/tim-kiem'
    }

    //Lấy Q&A
    public function getQuestAndAnswer($key)
    {
        $webAtribute = $this->_websiteAttributeService->query([['Type', $key]]);
        $arr = [];
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
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


    //Trang Shop theo thể loại
    public function ShopHome($Slug, Request $request)
    {
        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('Shop');

        //Lấy Url 
        $currentURL = $request->fullUrl();

        //Lấy thể loại sản phẩm
        $CategoryProd = $this->_productcategoriesService->query([['Slug', $Slug]]);
        $slugCategory = $CategoryProd[0]->Name;
        $env = env('URLIMAGE');

        //Lấy sản phẩm theo thể loại
        $data = $this->_productsService->query([['ProductCategoryId', $CategoryProd[0]->Id], ['Deleted', false], ['IsPublic', true]])->sortbydesc('DateCreated');
        $data = $this->paginate_($data, $currentURL);

        foreach ($data as $val) {

            //Thay đường dẫn ảnh
            $val->ProductImage = $env . $val->ProductImage;
            if ($val->ProductImage == $env) {
                $val->ProductImage = null;
            }

            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(" ", $val->DateCreated);
            $day = $split[0];
            $day = str_replace('-', '/', $day);
            $date = Carbon::createFromFormat('Y/m/d', $day);
            $monthName = $date->format('F');

            //Lấy ngày
            $day_split = explode("/", $day);

            //Gán thêm 2 giá trị ngày và tháng cho Blog
            $val['month'] = $monthName;
            $val['day'] = $day_split[count($day_split) - 1];

            //Lấy tên sản phẩm
            $split_content = explode("|", $val->Name);
            $val->Name = $split_content[0];

            //Lấy mapping picture của sản phẩm
            $productPictureMapping_ = $this->_productpictureMappingService->query([['ProductId', $val->Id]]);
            $listpictureMapping_ = [];
            foreach ($productPictureMapping_ as $item) {
                //Lấy picture theo Id
                $picture = $this->_picturesService->query([['Id', $item->PictureId]]);

                //Thay đường dẫn ảnh
                $picture[0]->Url = $env . $picture[0]->Url;

                //Lưu vào array
                $listpictureMapping_[] = $picture[0];
            }

            //Lấy url ảnh đại diện sản phẩm
            if (count($listpictureMapping_) != 0) {
                if ($listpictureMapping_[0]->Url == $env) {
                    $val->ProductImage = null;
                } else {
                    $val->ProductImage = $listpictureMapping_[0]->Url;
                }
            }
        }

        //Lấy website attribute 
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }


        //Lưu meta web
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

    //Trang Shop tổng
    public function ShopCategory()
    {
        //Lấy các thể loại có vị trí 10
        $ProductCategories = PRODUCTCATEGORIES::where([['Position', '10']])->get();

        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('Shop');
        $env = env('URLIMAGE');

        //Lấy các sản phẩm theo tửng thể loại
        $DsProDuct = [];
        for ($i = 10; $i <= 17; $i++) {

            //Lấy sản phẩm theo thể loại
            $products = $this->_productsService->query([['ProductCategoryId', '=', $i], ['Deleted', false]])->sortbydesc('DateCreated')->take(3);
            foreach ($products as $val) {

                //Thay đường dẫn ảnh
                $val->ProductImage = $env . $val->ProductImage;
                if ($val->ProductImage == $env) {
                    $val->ProductImage = null;
                }

                //Cắt chuỗi lấy ngày/tháng/năm
                $split = explode(" ", $val->DateCreated);
                $day = $split[0];
                $day = str_replace('-', '/', $day);
                $date = Carbon::createFromFormat('Y/m/d', $day);
                $monthName = $date->format('F');

                //Lấy ngày
                $day_split = explode("/", $day);

                //Gán thêm 2 giá trị ngày và tháng cho Blog
                $val['month'] = $monthName;
                $val['day'] = $day_split[count($day_split) - 1];

                //Lấy tên sản phẩm
                $split_content = explode("|", $val->Name);
                $val->Name = $split_content[0];

                //Lưu sản phẩm vào array
                $DsProDuct[] = $val;
            }
        }

        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lưu meta web
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

    //Tìm kiếm sản phẩm
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

        //Tìm kiếm sản phẩm
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
            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(" ", $val->DateCreated);
            $day = $split[0];
            $day = str_replace('-', '/', $day);
            $date = Carbon::createFromFormat('Y/m/d', $day);
            $monthName = $date->format('F');

            //Lấy ngày
            $day_split = explode("/", $day);

            //Gán thêm 2 giá trị ngày và tháng cho Blog
            $val['month'] = $monthName;
            $val['day'] = $day_split[count($day_split) - 1];

            //Lấy tên sản phẩm
            $split_content = explode("|", $val->Name);
            $val->Name = $split_content[0];

            //Thay đường dẫn ảnh
            $val->ProductImage = $env . $val->ProductImage;
            if ($val->ProductImage == $env) {
                $val->ProductImage = null;
            }
        }

        //Đổi array sang collection và sắp xếp theo ngày tạo rồi phân trang
        $listProducts = (new Collection($listProducts));
        $listProducts = $listProducts->sortbydesc('DateCreated');
        $listProducts = $this->paginate_($listProducts, $currentURL);

        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lưu meta web
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
        //Lấy sản phẩm theo Slug
        $products = $this->_productsService->query([['Slug', $Slug], ['Deleted', false]], 1);

        //Lấy thể loai sản phẩm
        $CategoryProduct = $this->_productcategoriesService->query([['Id', $products[0]->ProductCategoryId]]);

        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('Shop');
        $env = env('URLIMAGE');

        //Thêm class cho nội dung
        $products[0]->Content = str_replace('src="/', 'src="' . $env . ('/'), $products[0]->Content);
        $products[0]->Content = str_replace('<img ', '<img style="width:100%; height:auto;"', $products[0]->Content);

        //Lấy mapping thuộc tính sản phẩm
        $ProductAttribute = $this->_productattributeMappingService->query([['ProductId', $products[0]->Id]]);

        //Thay đường dẫn ảnh
        $products[0]->ProductImage = $env . $products[0]->ProductImage;
        if ($products[0]->ProductImage == $env) {
            $products[0]->ProductImage = null;
        }

        //Nếu có ít nhất 1 thuộc tính thì dùng thuộc tính đầu tiên làm giá sản phẩm không thì hiển thị theo mặc đinh
        if (count($ProductAttribute) > 0) {
            $products[0]->Price = $ProductAttribute[0]->Price;
        }

        //lấy picture mapping của sản phẩm
        $productPictureMapping = $this->_productpictureMappingService->query([['ProductId', $products[0]->Id]]);
        $listpictureMapping = [];
        foreach ($productPictureMapping as $item) {
            //Lấy picture theo Id
            $picture = $this->_picturesService->query([['Id', $item->PictureId]]);

            //Thay đường dẫn ảnh
            $picture[0]->Url = $env . $picture[0]->Url;
            if ($picture[0]->Url == $env) {
                $picture[0]->Url = null;
            }
            $listpictureMapping[] = $picture[0];
        }

        //Lấy sản phẩm liên quan
        $products_Lienquan = $this->_productsService->query([['ProductCategoryId', $products[0]->ProductCategoryId], ['Deleted', false], ['Id', '!=', $products[0]->Id]])->sortbydesc('DateCreated')->take(3); //
        foreach ($products_Lienquan as $val) {
            //Thay đường dẫn ảnh
            $val->ProductImage = $env . $val->ProductImage;
            if ($val->ProductImage == $env) {
                $val->ProductImage = null;
            }
        }

        //Xử lý ngày tháng năm
        $final_result = '';
        $split = explode(" ", $products[0]->DateCreated);
        $day = $split[0];
        $day = str_replace('-', '/', $day);
        $date = Carbon::createFromFormat('Y/m/d', $day);
        $monthName = $date->format('F');
        $monthName = substr($monthName, 0, 3);

        //Lấy ngày
        $day_split = explode("/", $day);
        $products[0]->DateCreated = $monthName . ' ' . $day_split[2] . ',' . $day_split[0];

        //Lấy danh sách bình luận
        $comments = COMMENTS::where([['BlogId', $products[0]->Id], ['isBlog', false]])->paginate(5);
        foreach ($comments as $item) {
            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $item->DateCreate);
            $dmy = $split[0];
            $time = substr($split[1], 0, 5);
            $item->DateCreate = $dmy . ' ' . $time;

            //Ẩn tên người dùng
            $temp = "";
            for ($i = 0; $i < strlen($item->UserName) - 2; $i++) {
                $temp = $temp . "*";
            }
            $item->UserName = substr($item->UserName, 0, 1) . $temp . substr($item->UserName, strlen($item->UserName) - 1, 1);
        }

        //Xử lú ajax bình luận
        if ($request->ajax()) {

            if ($request->up == true) {

                $commentpartial = $this->upComment($request);
                return response()->json([
                    'commentpartial' => $commentpartial,
                    'message' => 'Thành công',
                    'code' => 200
                ], 200);
            }

            $commentpartial = $this->loadComment($products[0]->Id);
            return response()->json([
                'commentpartial' => $commentpartial,
                'message' => 'Thành công',
                'code' => 200
            ], 200);
        }

        //Lưu meta web
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
        //Lưu thông tin đơn hàng
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

        //Tạo đơn hàng
        $createOrder = $this->_ordersService->create($order);

        //Kiểm tra thuộc tính sản phẩm
        $idAttr = "";
        $getNameAttribute = "";
        if ($request->Id_Attr == -1) {
            $idAttr = null;
            $getNameAttribute = null;
        } else {
            //Id thuộc tính gửi về
            $idAttr = $request->Id_Attr;

            //Lấy ra mapping thuộc tính theo id
            $attributeMapping = $this->_productattributeMappingService->query([['Id', $request->Id_Attr]]);

            //Lấy ra thuộc tính theo id
            $attribute = $this->_productattributeService->query([['Id', $attributeMapping[0]->ProductAttributeId]]);

            //Lấy tên thuộc tính
            $getNameAttribute = $attribute[0]->Description;
        }

        //Lưu thông tin chi tiết đơn hàng
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

        //Tạo chi tiết đơn hàng
        $createOrderItem = $this->_orderItemService->create($orderitem);

        //Lấy mail
        $Atribute = $this->_websiteAttributeService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'email']]);

        //Lấy mail bcc
        $AtributeMailBcc = $this->_websiteAttributeService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'mail_bcc']]);

        //Kiểm tra mail
        $mail = $Atribute[0]->Value;
        $mailBcc = $AtributeMailBcc[0]->Value;
        if ($mailBcc == null || $mailBcc == '') {
            $mailBcc = $mail;
        }

        //Luu thông tin cho gửi mail
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

        //Gửi mail
        if ($mail != null || $mail != '') {
            $message = view('Shop.MailXacNhan', ['valueRequest' => $valueRequest])->render();
            $this->_mailService->SendMail('Bệnh viện Thú Y PetPro', $mail, 'Thông báo đặt hàng', $message, $mailBcc);
        }

        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('Shop');

        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Shop'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            //Luu meta title mới
            if ($val->Description == 'title') {
                $val->Value = 'Xác nhận đặt hàng thành công';
            }
        }

        //Lưu meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'QNA' => $QNA,
            'Meta' => $Meta,
        ];
        return view('Shop.ShopConfirm')->with($data);
    }
}
