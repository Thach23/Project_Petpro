<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PETPROFILES extends Model
{

    protected $table = 'PetProfiles';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'DayOfBirth',
        'Gender',
        'ProfileId',
        'Deleted',
        'Type',
        'Weight',
        'Size',
        'Height',
        'Color',
        'Status',
        'LastUpdate',
        'Image'
    ];

    public function Profiles()
    {
        return $this->belongsTo(Profiles::class, 'ProfileId', 'Id');
    }
}
