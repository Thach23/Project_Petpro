<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BLOGS;
use App\Models\FILES;
use App\Services\IService\IBlogsService;
use App\Services\IService\IFilesService;
use App\Services\IService\IMailService;
use App\Services\IService\ILocationsService;
use App\Services\IService\IDepartmentsService;
use App\Services\IService\IRecruitsService;
use App\Services\IService\IWebsiteAttributesService;
use Illuminate\Support\Str;

class TuyenDungController extends Controller
{
    protected $_blogsService;
    protected $_mailService;
    protected $_filesService;
    protected $_departmentsService;
    protected $_locationsService;
    protected $_recruitsService;
    protected $_websiteAttributeService;

    public function __construct(IWebsiteAttributesService $websiteAttributeService, IRecruitsService $recruitsService, IBlogsService $blogsService, IFilesService $filesService, IMailService $mailService, ILocationsService $locationsService, IDepartmentsService $departmentsService)
    {
        $this->_blogsService = $blogsService;
        $this->_filesService = $filesService;
        $this->_mailService = $mailService;
        $this->_departmentsService = $departmentsService;
        $this->_locationsService = $locationsService;
        $this->_recruitsService = $recruitsService;
        $this->_websiteAttributeService = $websiteAttributeService;
        //$this->middleware('auth')->except('DangKyTuyenDung');
    }

    //----------------------------------------------------
    //Trang tuyển dụng
    public function TuyenDung()
    {
        //Lấy Phong ban
        $Phongban = $this->_departmentsService->query([['Deleted', false]]);

        //Lấy Dia diem
        $Diadiem = $this->_locationsService->query([['Deleted', false]]);

        //Lấy bài tuyển dụng
        $recruits = $this->_recruitsService->query([['Deleted', false]]);

        //Lấy website webAtribute và slide banner
        $slideBanner = [];
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Recruit'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            //Lấy slideBanner
            if (str::contains($val->Description, 'slide')) {
                $slideBanner[] = $val;
            }
        }

        //Lưu meta ảnh
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'Meta' => $Meta,
            'Phongban' => $Phongban,
            'Diadiem' => $Diadiem,
            'recruits' => $recruits,
            'slideBanner' => $slideBanner,
        ];

        return view('TuyenDung.TuyenDung')->with($data);
    }

    //Ajax hiển thị bài tuyển dụng
    public function loadRecruit(Request $request)
    {
        $daynow = Carbon::now();
        //Hiện toàn bộ 
        if (str::contains($request->key, '-1') == true) {
            $recruits = $this->_recruitsService->query([['Deleted', false], ['DayStart', '<=', $daynow], ['DayEnd', '>=', $daynow]], 5)->sortbydesc('DayStart');
            $recruitpartial = view('Partital_Share.RecruitPartial', compact('recruits'))->render();

            return response()->json([
                'recruitpartial' => $recruitpartial,
                'message' => 'Thành công',
                'code' => 200
            ], 200);
        } else {
            //Hiện theo phòng ban
            if (str::contains($request->key, 'pb') == true) {
                $split = explode('-', $request->key);
                $key = $split[0];

                $recruits = $this->_recruitsService->query([['DepartmentId', $key], ['Deleted', false], ['DayStart', '<=', $daynow], ['DayEnd', '>=', $daynow]], 5)->sortbydesc('DayStart');
                $recruitpartial = view('Partital_Share.RecruitPartial', compact('recruits'))->render();

                return response()->json([
                    'recruitpartial' => $recruitpartial,
                    'message' => 'Thành công',
                    'code' => 200
                ], 200);
            } else {
                //Hiện theo địa điểm
                $split = explode('-', $request->key);
                $key = $split[0];

                $recruits = $this->_recruitsService->query([['LocationId', $key], ['Deleted', false], ['DayStart', '<=', $daynow], ['DayEnd', '>=', $daynow]], 5)->sortbydesc('DayStart');
                $recruitpartial = view('Partital_Share.RecruitPartial', compact('recruits'))->render();

                return response()->json([
                    'recruitpartial' => $recruitpartial,
                    'message' => 'Thành công',
                    'code' => 200
                ], 200);
            }
        }
    }

    public function ChiTietTuyenDung($Id)
    {
        //Lây bài tuyển dụng theo Id
        $blogs = $this->_recruitsService->query([['Temp_1', $Id]], 1);
        $env = env('URLIMAGE');

        //Thay đường dẫn ảnh
        $blogs[0]->Temp_2 = $env . $blogs[0]->Temp_2;
        if ($blogs[0]->Temp_2 == $env) {
            $blogs[0]->Temp_2 = null;
        }

        //Thay đương dẫn ảnh
        $blogs[0]->Content = str_replace('src="/', 'src="' . $env . ('/'), $blogs[0]->Content);


        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Recruit'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            // if (str::contains($val->Description, 'slide')) {
            //     $slideBanner[] = $val;
            // }

            if ($val->Description == 'title') {
                $val->Value = $blogs[0]->Title;
            }

            if ($val->Description == 'description') {
                $val->Value = $blogs[0]->Description;
            }
        }

        //Lấy 3 bài tuyển dụng mới nhất
        $blogs_Lienquan = $this->_recruitsService->query([['Deleted', false], ['LocationId', $blogs[0]->LocationId], ['Id', '!=', $blogs[0]->Id]])->sortbydesc('DayStart')->take(3); //
        foreach ($blogs_Lienquan as $val) {
            //Thay đường dẫn ảnh
            $strURL = env('URLIMAGE');
            $val->Temp_2 = $strURL . $val->Temp_2;

            if ($val->Temp_2 == $strURL) {
                $val->Temp_2 = null;
            }
        }

        //Lưu meta ảnh
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'Meta' => $Meta,
            'blogs' => $blogs[0],
            'blogs_Lienquan' => $blogs_Lienquan,
        ];

        return view('TuyenDung.ChiTietTuyenDung')->with($data);
    }
}
