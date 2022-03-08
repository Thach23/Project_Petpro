<?php

namespace App\Services\IService;

interface IMailService
{
    function SendMail($name, $email, $subject, $message, $mailBcc);
}
