<?php

namespace App\Services;

use App\Services\IService\IProfilesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IProfilesRepository;

class ProfilesService extends BaseService implements IProfilesService
{
    public function CheckLogin($PhoneNumber, $Password)
    {
        $users = $this->repository->Query([['PhoneNumber', $PhoneNumber], ['Password', $Password]]);

        //Check if exist
        if ($users->count() !== 0) {
            $user = $users[0];
            session()->put('user', $user);
            return true;
        }
        return false;
    }
    public function getRepository()
    {
        return IProfilesRepository::class;
    }
}
