<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\PROFILES;

class EmailController extends Controller
{
    function index()
    {
        return view('Email.index');
    }
    function SendMail(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        // $message = $tokens;


        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = env('MAIL_HOST');  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = env('MAIL_USERNAME');                 // SMTP username
            $mail->Password = env('MAIL_PASSWORD');                           // SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION'); // Enable TLS encryption, `ssl` also accepted
            $mail->Port = env('MAIL_PORT');        // TCP port to connect to

            //encoding
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), $name);
            $mail->addAddress($email);               // Name is optional

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
