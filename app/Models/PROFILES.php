<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\PROFILES as Authenticatable;




// class PROFILES extends Model implements MustVerifyEmail
class PROFILES extends Model
{
    use Notifiable;


    protected $table = 'Profiles';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'FirstName',
        'LastName',
        'DayOfBirth',
        'Address',
        'Gender',
        'MemberCardId',
        'PhoneNumber',
        'Email',
        'UserName',
        'Password',
        'Deleted',
        'ConfirmToken',
        'DateCreated',
        'DateDeleted',
        'LastLoginTime',
        'Actived',
        'Role',
        'Image',
        'TokenChangePass'
    ];

    public function PetProfiles()
    {
        return $this->hasMany(PetProfiles::class, 'ProfileId', 'Id');
    }
}
