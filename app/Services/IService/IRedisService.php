<?php

namespace App\Services\IService;

interface IRedisService
{
    public function get($key);
    public function set($key, $value);
    public function flushDb();
}
