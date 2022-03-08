<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IService\IWebsiteAttributesService;
use App\Services\IService\IBlogsService;
use Illuminate\Support\Str;

class CauChuyenPetProController extends Controller
{
    protected $_websiteAttributeService;
    protected $_blogsService;

    public function __construct(IWebsiteAttributesService $websiteAttributeService, IBlogsService $blogsService)
    {
        $this->_websiteAttributeService = $websiteAttributeService;
        $this->_blogsService = $blogsService;
    }

    //Lấy chuyên khoa
    public function getChuyenKhoa()
    {
        $combine = [];
        $dsChuyenKhoa = $this->_blogsService->query([['BlogCategoryId', 16], ['Deleted', false], ['IsAvailable', true]]);
        //Cắt chuỗi lấy tên ảnh
        foreach ($dsChuyenKhoa as $val) {
            //Cắt chuỗi lấy tên ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;


            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];

            $combine[] = $val;
        }

        $dsDichVu = $this->_blogsService->query([['BlogCategoryId', 15], ['Deleted', false], ['IsAvailable', true]]);
        //Cắt chuỗi lấy tên ảnh
        foreach ($dsDichVu as $val) {
            //Cắt chuỗi lấy tên ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;


            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];

            $combine[] = $val;
        }
        return $combine;
    }

    //Lấy danh sách Q&A
    public function getQuestAndAnswer($key)
    {
        $webAtribute = $this->_websiteAttributeService->query([['Type', $key]]);
        $arr = [];
        foreach ($webAtribute as $val) {
            //Cắt chuỗi lấy tên ảnh
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

    //Trang câu chuyện petpro
    public function CauChuyenPetPro()
    {
        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('Page_Story');
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Lấy 4 trang cây truyện petpro
        $CauChuyenblogs = $this->_blogsService->query([['BlogCategoryId', 7], ['Deleted', false], ['IsAvailable', true], ['Position', 999]]);
        //Xử lý tên ảnh
        foreach ($CauChuyenblogs as $val) {
            //Cắt chuỗi lấy tên ảnh
            $strURL = env('URLIMAGE');
            $val->BlogImage = $strURL . $val->BlogImage;

            //Cắt chuỗi lấy ngày/tháng/năm
            $split = explode(' ', $val->DateCreated);
            $val->DateCreated = $split[0];
        }

        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Page_Story'], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Cắt chuỗi lấy tên ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            //Thay đổi dường dẫn link youtube
            $a = '.be';
            $b = 'be.com/embed';
            $val->Value = str_replace($a, $b, $val->Value);
        }

        //Lưu meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'QNA' => $QNA,
            'CauChuyenblogs' => $CauChuyenblogs,
            // 'urlVideo' => $urlVideo[0],
            'dsChuyenKhoa' => $dsChuyenKhoa,
            'Meta' => $Meta,
        ];

        return view('CauChuyenPetPro.CauChuyenPetPro')->with($data);
    }

    //Trang giới thiệu bệnh viện
    public function GioiThieuBenhVien()
    {
        //Lấy chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();
        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('About_Hospital');
        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'About_Hospital'], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Xử lý đường dẫn tên ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            //Thay đổi đường link youtube
            if ($val->Description == 'video_2_1') {
                $a = '.be';
                $b = 'be.com/embed';
                $val->Value = str_replace($a, $b, $val->Value);
            }

            //Replace thêm class cho nội dung
            if ($val->Description == 'noidung_2' || $val->Description == 'noidung_1') {
                $a = '<p>';
                $b = '<p class="mb-6">';
                $val->Value = str_replace($a, $b, $val->Value);
            }
        }

        //Luu meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data_ = [
            'QNA' => $QNA,
            'Meta' => $Meta,
            'data' => $webAtribute,
            'dsChuyenKhoa' => $dsChuyenKhoa,
        ];

        return view('CauChuyenPetPro.about_hospital')->with($data_);
    }

    //Trang đội ngũ bác sĩ
    public function DoiNguBacSi()
    {
        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('About_Staff');

        //Lấy website attribute
        $data = $this->_websiteAttributeService->query([['Type', 'About_Staff'], ['Deleted', false]]);

        foreach ($data as $val) {

            //Thay đổi dường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lấy chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Lưu meta web
        $Meta['collection'] = $data;
        $Meta['blog'] = null;

        $data_ = [
            'QNA' => $QNA,
            'Meta' => $Meta,
            'data' => $data,
            'dsChuyenKhoa' => $dsChuyenKhoa,
        ];
        return view('CauChuyenPetPro.about_staff')->with($data_);
    }

    //Trang trang thiết bị
    public function TrangThietBiHD()
    {
        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('About_Equipment');

        //Lấy website attribute
        $data = $this->_websiteAttributeService->query([['Type', 'About_Equipment'], ['Deleted', false]]);
        foreach ($data as $val) {

            //Thay đổi dường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }


        //Lấy chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Lưu meta web
        $Meta['collection'] = $data;
        $Meta['blog'] = null;

        $data_ = [
            'QNA' => $QNA,
            'Meta' => $Meta,
            'data' => $data,
            'dsChuyenKhoa' => $dsChuyenKhoa,
        ];
        return view('CauChuyenPetPro.about_equipment')->with($data_);
    }

    //Trang khách hàng nói về petpro
    public function KHNoivePetPro()
    {

        //Lấy Q&A
        $QNA = $this->getQuestAndAnswer('About_Testimonial');
        //Lấy website attribute
        $data = $this->_websiteAttributeService->query([['Type', 'About_Testimonial'], ['Deleted', false]]);
        foreach ($data as $val) {

            //Thay đổi dường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lấy chuyên khoa
        $dsChuyenKhoa = $this->getChuyenKhoa();

        //Lưu meta web
        $Meta['collection'] = $data;
        $Meta['blog'] = null;

        $data_ = [
            'QNA' => $QNA,
            'Meta' => $Meta,
            'data' => $data,
            'dsChuyenKhoa' => $dsChuyenKhoa,
        ];
        return view('CauChuyenPetPro.about_testimonial')->with($data_);
    }
}
