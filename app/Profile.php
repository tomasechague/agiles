<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'address', 'country', 'province','postalCode','lesson','is_teacher','user_id'
    ];
}
