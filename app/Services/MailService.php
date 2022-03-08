<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Services\IService\IMailService;

class MailService implements IMailService
{
    protected function CreateMail($name, $email, $subject, $message, $mailBcc)
    {
        $mail = new PHPMailer(true);
        //Server settings
        //$mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = env('MAIL_HOST'); // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = env('MAIL_USERNAME'); // SMTP username
        $mail->Password = env('MAIL_PASSWORD'); // SMTP password
        $mail->SMTPSecure = env('MAIL_ENCRYPTION'); // Enable TLS encryption, `ssl` also accepted
        $mail->Port = env('MAIL_PORT'); // TCP port to connect to

        //encoding
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $mail->setFrom(env('MAIL_FROM_ADDRESS'), $name);
        $mail->addAddress($email); // Name is optional

        // $mail->addCC($mailCc);
        $mail->addBCC($mailBcc);

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail;
    }
    public function SendMail($name, $email, $subject, $message, $mailBcc)
    {
        try {
            $mail = $this->CreateMail($name, $email, $subject, $message, $mailBcc);
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
