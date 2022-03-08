<?php

namespace App\Commons;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class Cookies
{
    public function SetCookie($name, $value, $minutes = 60 * 24 * 3)
    {
        $response = new Response('Set Cookie');
        $response->withCookie(cookie($name, $value, $minutes));
        //return $response;
        $response->send();
    }

    public function QueueCookie($name, $value, $minutes = 60 * 24 * 3)
    {
        return Cookie::queue($name, $value, $minutes);
    }

    public function GetCookie($name)
    {
        $request = Request::capture();
        $value = $request->cookie($name);
        return $value;
    }
}
