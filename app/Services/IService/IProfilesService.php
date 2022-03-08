<?php

namespace App\Services\IService;

interface IProfilesService extends IBaseService
{
    function CheckLogin($PhoneNumber, $Password);
}
