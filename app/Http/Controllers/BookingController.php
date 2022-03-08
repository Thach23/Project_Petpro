<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IService\IWebsiteAttributesService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\PayUService\Exception;
use App\Services\IService\IBlogsService;
use App\Services\IService\IMailService;
use App\Models\WEBSITEATTRIBUTES;

class BookingController extends Controller
{
    protected $_websiteAttributeService;
    protected $_blogsService;
    protected $_mailService;

    public function __construct(IWebsiteAttributesService $websiteAttributeService, IBlogsService $blogsService, IMailService $mailService)
    {
        $this->_websiteAttributeService = $websiteAttributeService;
        $this->_blogsService = $blogsService;
        $this->_mailService = $mailService;
    }

    //Trang đặt lịch
    public function DatLich()
    {
        $current_url = url()->current();

        //Lấy website attribute 
        $LocalMap = $this->_websiteAttributeService->query([['Type', 'Map'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($LocalMap as $val) {
            //Cắt chuỗi lấy tên ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lây toàn bộ dich vụ lưu vô combine
        $combine = [];
        //Lấy chuyên khoa
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

        //Lấy dịch vụ
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

        //Lấy website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Booking'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Cắt chuỗi lấy tên ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lưu meta
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'Meta' => $Meta,
            'LocalMap' => $LocalMap,
            'dsChuyenKhoa' => $combine,
        ];

        return view('Booking.DatLichHen')->with($data);
    }

    //Xác nhận đặt lịch
    public function XacNhanDatLich(Request $request)
    {
        //Lấy dữ liệu đặt lịch Request
        $split_day = explode('-', $request->date);
        $day = $split_day[2] . "/" . $split_day[1] . "/" . $split_day[0];

        //Lưu thông tin điền
        $valueRequest = [];
        $valueRequest['department'] = $request->department;
        $valueRequest['pet'] = $request->pet;
        $valueRequest['name'] = $request->name;
        $valueRequest['email'] = $request->email;
        $valueRequest['phone'] = $request->phone;
        $valueRequest['date'] =  $day;
        $valueRequest['location'] = $request->location;
        $valueRequest['text'] = $request->text;

        //Lấy URL của trang submit form
        $url = url()->previous();

        //sendmail
        $mail = $request->email;
        //Lấy mail bcc
        $AtributeMailBcc = $this->_websiteAttributeService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'mail_bcc']]);
        $mailBcc = $AtributeMailBcc[0]->Value;

        //Kiểm tra mail bcc 
        if ($mailBcc == null || $mailBcc == '') {
            $Atribute = $this->_websiteAttributeService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'email']]);
            $mailBcc = $Atribute[0]->Value;
        }

        //Kiểm tra mail điền trước khi send mail
        if ($mail != null || $mail != '') {
            $message = view('Booking.MailXacNhan', ['valueRequest' => $valueRequest])->render();
            $this->_mailService->SendMail('Bệnh viện Thú Y PetPro', $mail, 'Đặt lịch hẹn thành công', $message, $mailBcc);
        }

        //Lất website attribute
        $webAtribute = $this->_websiteAttributeService->query([['Type', 'Booking'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Cắt chuỗi lấy tên ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            //Luu meta title mới
            if ($val->Description == 'title') {
                $val->Value = 'Xác nhận đặt lịch thành công';
            }
        }

        //Lưu meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'url' => $url,
            'Meta' => $Meta,
        ];

        return view('Booking.XacNhanDatLich')->with($data);
        // return response()->json([
        //     'message' => 'Thành công',
        //     'code' => 200
        // ], 200);


    }
}
