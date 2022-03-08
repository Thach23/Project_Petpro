<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IService\IWebsiteAttributesService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\IService\IBlogsService;
use App\Services\IService\IBlogCategoriesService;
use App\Services\PayUService\Exception;
use App\Models\WEBSITEATTRIBUTES;
use App\Models\BLOGS;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $_websiteAttributeService;
    protected $_blogsService;
    protected $_blogcategoriesService;

    public function __construct(IBlogCategoriesService $blogcategoriesService, IWebsiteAttributesService $websiteAttributeService, IBlogsService $blogsService)
    {
        $this->_websiteAttributeService = $websiteAttributeService;
        $this->_blogsService = $blogsService;
        $this->_blogcategoriesService = $blogcategoriesService;
    }

    public function Home()
    {
        //Lấy website attribute 
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'About_Home'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lấy 3 bài viết mới
        $blogs = $this->_blogsService->query([['BlogCategoryId', 17], ['Deleted', false], ['IsAvailable', true]])->sortbydesc('DateCreated')->take(3);
        //Thay đường dẫn ảnh
        foreach ($blogs as $val) {
            //Thay đường dẫn ảnh
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

            //Lấy tên bài viết
            $split_content = explode("|", $val->Title);
            $val->Title = $split_content[0];

            //Lấy thể loại bài viết
            $CategoryBlog = $this->_blogcategoriesService->query([['Id', $val->BlogCategoryId]]);
            $val->BlogCategoryId = $CategoryBlog[0]->Name;
        }

        //Lấy các chuyên khoa
        $ChuyenKhoablogs = $this->_blogsService->query([['BlogCategoryId', 16], ['Deleted', false], ['IsAvailable', true], ['Position', '<', '907'], ['Position', '>=', '900']]);

        //Sắp xếp theo vị trí
        $ChuyenKhoablogs = $ChuyenKhoablogs->sortby('Position');
        $arr = [];

        foreach ($ChuyenKhoablogs as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

            $strURL = env('URLIMAGE');
            $val->ImageUrl = $strURL . $val->ImageUrl;

            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];

            if ($val->Title != 'Siêu âm') {
                $arr[] = $val;
            }
        }
        $ChuyenKhoablogs = $arr;

        //Lấy các dịch vụ
        $DichVublogs = $this->_blogsService->query([['BlogCategoryId', 15], ['Deleted', false], ['IsAvailable', true]]);

        foreach ($DichVublogs as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->ImageUrl = $strURL . $val->ImageUrl;

            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];

            //Xóa bớt dịch vụ
            if ($val->Position >= 906) {
                unset($DichVublogs[$val->Position - 900]);
            }
        }

        //Lấy 4 câu chuyện PetPro
        $CauChuyenblogs = $this->_blogsService->query([['BlogCategoryId', 7], ['Deleted', false], ['IsAvailable', true], ['Position', 999]]);

        foreach ($CauChuyenblogs as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];
        }

        //Lưu meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'blogs' => $blogs,
            'ChuyenKhoablogs' => $ChuyenKhoablogs,
            'DichVublogs' => $DichVublogs,
            'Meta' => $Meta,
            'webAtribute' => $webAtribute,
            'CauChuyenblogs' => $CauChuyenblogs,
            // 'urlVideo' => $urlVideo[0],
        ];
        return view('Home.home')->with($data);
    }
}
