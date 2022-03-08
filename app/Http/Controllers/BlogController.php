<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BLOGS;
use App\Models\COMMENTS;
use App\Models\BLOGCATEGORIES;
use App\Services\IService\IBlogsService;
use App\Services\IService\IBlogCategoriesService;
use App\Services\IService\ICommentsService;
use App\Services\IService\ITagsService;
use App\Services\IService\IBlogTagMappingService;
use App\Services\IService\IWebsiteAttributesService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Factory;
use App\Http\Controllers\length;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;

class BlogController extends Controller
{
    protected $_blogsService;
    protected $_commentsService;
    protected $_tagsService;
    protected $_blogtagmappingService;
    protected $_websiteAttributeService;
    protected $_blogcategoriesService;

    public function __construct(IBlogCategoriesService $blogcategoriesService, IWebsiteAttributesService $websiteAttributeService, IBlogsService $blogsService, ICommentsService $commentsService, ITagsService $tagsService, IBlogTagMappingService $blogtagmappingService)
    {
        $this->_tagsService = $tagsService;
        $this->_blogsService = $blogsService;
        $this->_commentsService = $commentsService;
        $this->_blogtagmappingService = $blogtagmappingService;
        $this->_websiteAttributeService = $websiteAttributeService;
        $this->_blogcategoriesService = $blogcategoriesService;
    }

    // -----------------------------------------------------------------
    //Action load danh sách comments
    public function loadComment($Id)
    {
        //lấy danh sách comments
        $comments = COMMENTS::where([['BlogId', $Id], ['isBlog', true], ['Deleted', false]])->paginate(5);

        //xử lý comment
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

        //tạo biến luu trữ dữ liệu comment
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

        //Luu comment vô dtb
        $create = $this->_commentsService->create($data);

        //Lấy dữ liệu comment
        $comments = COMMENTS::where([['BlogId', $request->Id_Blog], ['isBlog', true], ['Deleted', false]])->paginate(5);
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

    //Lấy dữ liệu chuyên khoa
    public function getChuyenKhoa()
    {
        //Lấy dữ liệu chuyên khoa
        $ChuyenKhoablogs = $this->_blogsService->query([['BlogCategoryId', 16], ['Deleted', false], ['IsAvailable', true]]);
        //Cắt chuỗi lấy tên ảnh
        foreach ($ChuyenKhoablogs as $val) {
            //Cắt chuỗi lấy tên ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;


            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];
        }
        return $ChuyenKhoablogs;
    }

    //Bài viết tổng
    public function BlogCategory()
    {
        // lấy thể loại của bài viết
        $BlogCategories = [];
        for ($i = 17; $i <= 20; $i++) {
            $item = BLOGCATEGORIES::where([['Id', '=', $i]])->get();
            $BlogCategories[] = $item[0];
        }

        //Lấy các bài viết theo từng thể loại
        $DsBlog = [];
        for ($i = 17; $i <= 20; $i++) {
            //Lấy bài viết
            $blogs = $this->_blogsService->query([['BlogCategoryId', $i], ['Deleted', false], ['IsAvailable', true]])->sortbydesc('DateCreated')->take(3);
            foreach ($blogs as $val) {
                //Thay đổi dường dẫn ảnh
                $strURL = env('URLIMAGE');
                $val->BlogImage = $strURL . $val->BlogImage;

                //Cắt chuỗi lấy ngày/tháng/năm
                //Lấy tên tháng
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

                //Xử lý tên bài viết
                $split_content = explode("|", $val->Title);
                $val->Title = $split_content[0];

                //Kiểm tra đường dẫn ảnh 
                $val->BlogImage = $this->checkURL($val->BlogImage);

                //Lưu bài vết vô danh sách
                $DsBlog[] = $val;
            }
        }

        //Lấy danh sách các chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Lấy websiteAttribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Knowledge'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Cắt chuỗi lấy tên ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lưu meta cho web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data_ = [
            'DsBlog' => $DsBlog,
            'BlogCategories' => $BlogCategories,
            'Meta' => $Meta,
            'dsChuyenKhoa' => $dsChuyenKhoa,
            'key' => '',
        ];

        return view('BLog.blogCategory')->with($data_);
    }

    //Bài viết theo thể loại
    public function BlogHome($Slug, Request $request)
    {
        //Lấy url web
        $currentURL = $request->fullUrl();
        //Lấy danh sách chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Lấy thể loại bài viết
        $CategoryBlog = $this->_blogcategoriesService->query([['Slug', $Slug]]);
        $slugCategory = $CategoryBlog[0]->Name;

        //Lấy bài viết theo thể loại
        $data = $this->_blogsService->query([['BlogCategoryId', $CategoryBlog[0]->Id], ['Deleted', false], ['IsAvailable', true]])->sortbydesc('DateCreated');
        $data = $this->paginate_($data, $currentURL);

        //Cắt chuỗi lấy tên ảnh
        foreach ($data as $val) {
            //Thay đổi đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

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

            //Xử lý tên bài viết
            $split_content = explode("|", $val->Title);
            $val->Title = $split_content[0];

            //Kiểm tra đường dẫn ảnh
            $val->BlogImage = $this->checkURL($val->BlogImage);
        }

        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Knowledge'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Cắt chuỗi lấy tên ảnh
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
            'blogs' => $data,
            'dsChuyenKhoa' => $dsChuyenKhoa,
            'key' => '',
        ];
        return view('BLog.BlogHome')->with($data_);
    }

    //Tìm kiếm bài viết
    public function BlogSearch(Request $request)
    {
        //Lay url
        $currentURL = $request->fullUrl();
        //Lay key search
        $search = $request->input('key');
        $index = 0;
        //Lấy danh sách chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Tìm kiếm bài viết
        $listBlogs = BLOGS::where([['Title', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 17], ['IsAvailable', true]]) //17
            ->orwhere([['Title', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 18], ['IsAvailable', true]])
            ->orwhere([['Title', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 19], ['IsAvailable', true]])
            ->orwhere([['Title', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 20], ['IsAvailable', true]])
            ->orwhere([['Content', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 17], ['IsAvailable', true]]) //17
            ->orwhere([['Content', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 18], ['IsAvailable', true]])
            ->orwhere([['Content', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 19], ['IsAvailable', true]])
            ->orwhere([['Content', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 20], ['IsAvailable', true]])
            ->orwhere([['Description', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 17], ['IsAvailable', true]])
            ->orwhere([['Description', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 18], ['IsAvailable', true]])
            ->orwhere([['Description', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 19], ['IsAvailable', true]])
            ->orwhere([['Description', 'like', '%' . $search . '%'], ['Deleted', false], ['BlogCategoryId', '=', 20], ['IsAvailable', true]])->get(); //20

        //Sắp xếp bài viết
        $listBlogs = $listBlogs->sortbydesc('DateCreated');
        //Phân trang
        $listBlogs = $this->paginate_($listBlogs, $currentURL);
        // $listBlogs->appends(['key' => $search]);

        //Xử lý từng bài viết
        foreach ($listBlogs as $val) {
            //Thay đổi đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

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

            //Xư lý tên bài viết
            $split_content = explode("|", $val->Title);
            $val->Title = $split_content[0];

            //Kiểm tra đường dẫn ảnh
            $val->BlogImage = $this->checkURL($val->BlogImage);
        }

        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Knowledge'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Cắt chuỗi lấy tên ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Luu meta trang website
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'Meta' => $Meta,
            'blogs' => $listBlogs,
            'dsChuyenKhoa' => $dsChuyenKhoa,
            'slugCategory' => null,
            'key' => $search,
        ];
        return view('BLog.blogSearch')->with($data);
    }

    //Chi tiết trang bài viết
    public function BlogDetail($Slug, Request $request)
    {

        //Lấy bài viết theo slug
        $blogs = $this->_blogsService->query([['Slug', $Slug], ['Deleted', false]], 1);

        //Lấy danh sách chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();
        //Lấy thể loại bài viết
        $CategoryBlog = $this->_blogcategoriesService->query([['Id', $blogs[0]->BlogCategoryId]]);

        //Đổi đường dẫn src thẻ img trong content blog
        $a = 'src="/';
        $env = env('URLIMAGE');
        $b = 'src="' . $env . ('/');
        $blogs[0]->Content = str_replace($a, $b, $blogs[0]->Content);
        $blogs[0]->BlogImage = $env . $blogs[0]->BlogImage;
        //Kiểm tra đường dẫn ảnh
        $blogs[0]->BlogImage = $this->checkURL($blogs[0]->BlogImage);

        //Lấy danh sách bình luận
        $comments = COMMENTS::where([['BlogId', $blogs[0]->Id], ['isBlog', true]])->paginate(5);
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

        if ($request->ajax()) {
            if ($request->up == true) {
                //Thêm bình luận
                $commentpartial = $this->upComment($request);
                return response()->json([
                    'commentpartial' => $commentpartial,
                    'message' => 'Thành công',
                    'code' => 200
                ], 200);
            }

            //Load bình luận
            $commentpartial = $this->loadComment($blogs[0]->Id);
            return response()->json([
                'commentpartial' => $commentpartial,
                'message' => 'Thành công',
                'code' => 200
            ], 200);
        }

        //Xử lý ngày tháng năm
        $final_result = '';
        $split = explode(" ", $blogs[0]->DateCreated);
        $day = $split[0];
        $day = str_replace('-', '/', $day);
        $date = Carbon::createFromFormat('Y/m/d', $day);
        $monthName = $date->format('F');
        $monthName = substr($monthName, 0, 3);

        //Lấy ngày
        $day_split = explode("/", $day);
        $blogs[0]->DateCreated = $monthName . ' ' . $day_split[2] . ',' . $day_split[0];

        //Xử lý tên bài viết
        $split_content = explode("|", $blogs[0]->Title);
        $blogs[0]->Title = $split_content[0];


        //Lấy blos liên quan
        $blogs_Lienquan = [];
        if ($blogs[0]->BlogParentId != null) {
            //Lấy các Id bài viết 
            $split_Blog_ParentId = explode(",", $blogs[0]->BlogParentId);
            $index = 0;

            //Lấy bài theo Id parent
            foreach ($split_Blog_ParentId as $val) {
                if ($index <= 3) {
                    //Lấy bài viết
                    $item = $this->_blogsService->query([['Id', '=', $val], ['Deleted', false], ['IsAvailable', true]], 1);

                    if (count($item) > 0) {
                        $env = env('URLIMAGE');
                        //Thay đổi dường dẫn ảnh
                        $item[0]->BlogImage = $env . $item[0]->BlogImage;
                        $item[0]->BlogImage = $this->checkURL($item[0]->BlogImage);

                        //Xử lý tên bài viết
                        $split_content = explode("|", $item[0]->Title);
                        $item[0]->Title = $split_content[0];

                        $blogs_Lienquan[] =  $item[0];
                    }
                }
                $index++;
            }
        }

        //Lưu meta trang website
        $Meta['collection'] = null;
        $Meta['blog'] = $blogs[0];

        $data = [
            'Meta' => $Meta,
            'blogs' => $blogs[0],
            'dsChuyenKhoa' => $dsChuyenKhoa,
            'key' => '',
            'CategoryBlog' => $CategoryBlog[0],
            'blogs_Lienquan' => $blogs_Lienquan,
            'comments' => $comments,
        ];
        //dd($data);
        return view('BLog.blogDetail')->with($data);
    }

    //Kiểm tra đường dẫn
    public function checkURL($imgURL)
    {
        $env = env('URLIMAGE');
        if ($imgURL == $env) {
            $imgURL = null;
        }
        return $imgURL;
    }

    //Phân trang
    public function paginate_($items, $Slug, $perPage = 12, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url($Slug)]); // 'shop/tim-kiem'
    }
}
