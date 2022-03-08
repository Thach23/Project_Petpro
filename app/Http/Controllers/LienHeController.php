<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IService\IOrdersService;
use App\Services\IService\IWebsiteAttributesService;
use App\Services\IService\IMailService;
use Carbon\Carbon;
use Mail;
use Redirect, Response, DB, Config;
use App\Model\WEBSITEATTRIBUTES;

class LienHeController extends Controller
{
    protected $_ordersService;
    protected $_websiteAttributesService;
    protected $_mailService;

    public function __construct(IOrdersService $_ordersService, IWebsiteAttributesService $_websiteAttributesService, IMailService $mailService)
    {
        $this->_ordersService = $_ordersService;
        $this->_websiteAttributesService = $_websiteAttributesService;
        $this->_mailService = $mailService;
    }

    //Trang liên hệ
    public function LienHe()
    {
        //Lấy attribute ảnh cho web
        $LocalMap = $this->_websiteAttributesService->query([['Type', 'Map'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($LocalMap as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }
        }

        //Lấy webstie attrbiute ảnh
        $webAtribute = $this->_websiteAttributesService->query([['Type', 'Contact'], ['IsPublic', true], ['Deleted', false]]);
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
            'LocalMap' => $LocalMap,
            'webAtribute' => $webAtribute,
        ];
        return view('LienHe.LienHe')->with($data);
    }

    //Xác nhận thông tin liên hệ
    public function XacNhanLienHe(Request $request)
    {
        //Lấy url trang Liên hệ
        $url = url()->previous();

        //Luu thông tin liên hệ
        $valueRequest = [];
        $valueRequest['name'] = $request->name;
        $valueRequest['email'] = $request->email;
        $valueRequest['title'] = $request->title;
        $valueRequest['text'] = $request->text;

        $mail = $request->email;
        //Lấy mail bcc
        $AtributeMailBcc = $this->_websiteAttributesService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'mail_bcc']]);
        $mailBcc = $AtributeMailBcc[0]->Value;
        if ($mailBcc == null || $mailBcc == '') {
            $Atribute = $this->_websiteAttributesService->query([['Type', 'Scocial_Media'], ['Deleted', false], ['Description', 'email']]);
            $mailBcc = $Atribute[0]->Value;
        }

        //Gửi mail
        if ($mail != null || $mail != '') {
            $message = view('LienHe.MailXacNhan', ['valueRequest' => $valueRequest])->render();
            $this->_mailService->SendMail('Bệnh Viện Thú Y PetPro', $mail, 'Cảm ơn đã phản hồi', $message, $mailBcc);
        }
        //Lấy website attribute
        $webAtribute = $this->_websiteAttributesService->query([['Type', 'Contact'], ['IsPublic', true], ['Deleted', false]]);
        foreach ($webAtribute as $val) {
            //Thay đường dẫn ảnh
            if ($val->ControlType == 'Image') {
                $strURL = env('URLIMAGE');
                $val->Value = $strURL . $val->Value;
            }

            //Luu meta title mới
            if ($val->Description == 'title') {
                $val->Value = 'Xác nhận yêu cầu thành công';
            }
        }

        //Lưu meta web
        $Meta['collection'] = $webAtribute;
        $Meta['blog'] = null;

        $data = [
            'url' => $url,
            'Meta' => $Meta,

        ];

        return view('LienHe.XacNhanLienHe')->with($data);

        // return response()->json([
        //     'message' => 'Thành công',
        //     'code' => 200
        // ], 200);
    }
}
