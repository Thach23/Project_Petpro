<?php

namespace App\Services;

use App\Services\IService\IRedisService;
use Illuminate\Support\Facades\Redis;

class RedisService implements IRedisService
{
    public $redist;
    public function __construct()
    {
        $this->redist = new Redis();
        $this->connectTimeout = 2.5;
    }
    public function get($key)
    {
        //echo $this->redist::get($key);
        return $this->redist::get($key);
    }
    public function set($key, $value)
    {
        $this->redist::set($key, $value);
        //echo ('Set done');
    }
    public function flushDb()
    {
        $this->redist::flushDb();
        echo ('flushed');
    }
}
