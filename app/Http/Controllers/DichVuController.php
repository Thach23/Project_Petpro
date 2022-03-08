<?php

namespace App\Http\Controllers;

use App\Services\IService\IBlogsService;
use App\Services\IService\IWebsiteAttributesService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\IService\IBlogCategoriesService;
use Carbon\Carbon;

class DichVuController extends Controller
{
    protected $_blogsService;
    protected $_websiteAttributeService;
    protected $_blogcategoriesService;

    public function __construct(IBlogCategoriesService $blogcategoriesService, IWebsiteAttributesService $websiteAttributeService, IBlogsService $blogsService)
    {
        $this->_websiteAttributeService = $websiteAttributeService;
        $this->_blogsService = $blogsService;
        $this->_blogcategoriesService = $blogcategoriesService;
    }


    //Lấy chuyên khoa
    public function getChuyenKhoa()
    {
        $dsChuyenKhoa = $this->_blogsService->query([['BlogCategoryId', 16], ['Deleted', false], ['IsAvailable', true]]);

        foreach ($dsChuyenKhoa as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];
        }
        return $dsChuyenKhoa;
    }

    //Lấy dịch vụ
    public function getDichVu()
    {
        $DichVublogs = $this->_blogsService->query([['BlogCategoryId', 15], ['Deleted', false], ['IsAvailable', true]]);

        foreach ($DichVublogs as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;


            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];
        }
        return $DichVublogs;
    }

    //Lấy toàn bộ dịch vụ
    public function getAllServices()
    {
        $combine = [];
        //Lấy chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();
        //Lấy dịch vụ
        $dsDichVu = $this->getDichVu();

        foreach ($dsChuyenKhoa as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;


            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];

            $combine[] = $val;
        }

        foreach ($dsDichVu as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;


            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];

            $combine[] = $val;
        }
        return $combine;
    }

    //Lấy Q&A
    public function getQuestAndAnswer($key)
    {
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Services']]);
        $arr = [];
        if ($key == 1) {
            foreach ($webAtribute as $val) {
                //Thay đường dẫn ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                if (str::contains($val->Description, 'quest') == true && str::contains($val->Name, 'chi tiết') == false || str::contains($val->Description, 'answer') == true && str::contains($val->Name, 'chi tiết') == false) {
                    $arr[] = $val;
                }
            }
        } else {
            foreach ($webAtribute as $val) {
                //Thay đường dẫn ảnh
                if ($val->ControlType == 'Image') {
                    $strURL = env('URLIMAGE');
                    $val->Value = $strURL . $val->Value;
                }

                if (str::contains($val->Name, 'chi tiết') == true) {
                    $arr[] = $val;
                }
            }
        }
        return $arr;
    }

    //Trang chủ dịch vụ
    public function Services()
    {
        //Lấy câu hỏi trang dich vụ
        $QNA = $this->getQuestAndAnswer(1);
        //Lấy tất cả dich vụ
        $allServices = $this->getAllServices();
        //Lấy chuyên khoa
        $ChuyenKhoablogs = $this->getChuyenKhoa();

        foreach ($ChuyenKhoablogs as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

            $strURL = env('URLIMAGE');
            $val->ImageUrl = $strURL . $val->ImageUrl;


            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];
        }

        //Sắp xếp theo position
        $ChuyenKhoablogs = $ChuyenKhoablogs->sortby('Position');

        //Lấy dịch vụ
        $DichVublogs = $this->getDichVu();
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
        }
        unset($DichVublogs[8]);
        //Sắp xếp theo vị trí
        $DichVublogs = $DichVublogs->sortby('Position');

        //Lấy website attribute trang Services
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Services'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lấy website attribute bảo hiểm
        $baoHiem = $this->_websiteAttributeService->query([['Type', 'Pet_Insurance'], ['Deleted', false]]);
        foreach ($baoHiem as $val) {
            //Thêm class cho nội dung
            if (str::contains($val->Description, 'content') == true) {
                $val->Value = str_replace('<ul>', '<ul class="ml-5 space-y-5 list-disc">', $val->Value);
                $val->Value = str_replace('<li>', '<li class="text-sm text-gray-150">', $val->Value);
                $val->Value = str_replace('<strong>', '<strong class="font-bold text-blue-200">', $val->Value);
            }

            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Luu meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'QNA' => $QNA,
            'Meta' => $Meta,
            'ChuyenKhoablogs' => $ChuyenKhoablogs,
            'DichVublogs' => $DichVublogs,
            'dsChuyenKhoa' => $allServices,
            'baoHiem' => $baoHiem,

        ];
        return view('DichVu.Services')->with($data);
    }

    //Trang chi tiết dich vụ
    public function ServiceDetail($Slug)
    {
        //Lây các câu hỏi trang chi tiết dich vụ
        $QNA = $this->getQuestAndAnswer(-1);

        //Lấy ảnh cho breadcumb của trang
        $breadbcrumb = $this->_websiteAttributeService->query([['Type', 'Services'], ['Description', 'breadcrumb'], ['Deleted', false]]);
        $env = env('URLIMAGE');

        //Thay đường dẫn ảnh
        $breadbcrumb[0]->Value = $env . $breadbcrumb[0]->Value;

        //Lấy trang dich vụ theo slug
        $blogsDetail = $this->_blogsService->query([['Slug', $Slug]], 1);
        $strURL = env('URLIMAGE');

        //Thay đường dẫn ảnh
        $blogsDetail[0]->BlogImage = $strURL . $blogsDetail[0]->BlogImage;

        //Thay đường dẫn 
        $blogsDetail[0]->Content = str_replace('src="/', 'src="' . $env . ('/'), $blogsDetail[0]->Content);

        //Thêm class
        $blogsDetail[0]->Content = str_replace('<p>', '<p class="mb-6">', $blogsDetail[0]->Content);

        //Thay đường dẫn 
        $blogsDetail[0]->ContentTwo = str_replace('src="/', 'src="' . $env . ('/'), $blogsDetail[0]->ContentTwo);

        //Thêm class
        $blogsDetail[0]->ContentTwo = str_replace('<p>', '<p class="mb-6">', $blogsDetail[0]->ContentTwo);

        //Thay đường dẫn video youtube
        $blogsDetail[0]->Link = str_replace('.be', 'be.com/embed', $blogsDetail[0]->Link);

        //Lấy 3 bài viết liên quan
        $data = [];
        if ($blogsDetail[0]->BlogParentId != null) {
            //Lấy Id 3 bài viết liên quan
            $list_BlogParrentID =  explode(",", $blogsDetail[0]->BlogParentId);
            foreach ($list_BlogParrentID as $item) {
                if (count($data) < 3) {
                    $blog = $this->_blogsService->query([['Id', $item]], 1);
                    $data[] = $blog[0];
                }
            }
        }

        //Xử lý các yêu cầu 
        foreach ($data as $val) {
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

            //Lây tên bài viết
            $split_content = explode("|", $val->Title);
            $val->Title = $split_content[0];

            //Lây thẻ loại bài viết
            $CategoryBlog = $this->_blogcategoriesService->query([['Id', $val->BlogCategoryId]]);
            $val->BlogCategoryId = $CategoryBlog[0]->Name;
        }

        //Lấy danh sách chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Lấy danh sách dịch vụ
        $dsDichVu = $this->getDichVu();

        //Lấy toàn bộ dịch vụ
        $allServices = $this->getAllServices();

        //Lưu meta
        $Meta['collection'] = null;
        $Meta['blog'] = $blogsDetail[0];

        $data_ = [
            'QNA' => $QNA,
            'blogs' => $data,
            'blogsDetail' => $blogsDetail[0],
            'Meta' => $Meta,
            'breadbcrumb' => $breadbcrumb[0],
            'dsChuyenKhoa' => $dsChuyenKhoa,
            'dsDichVu' => $dsDichVu,
            'allServices' => $allServices,

        ];

        return view('DichVu.ServicesDetail')->with($data_);
    }
}
