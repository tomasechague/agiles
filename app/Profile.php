<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'address', 'country', 'province','postalCode','lesson','phone','is_teacher','user_id', 'lat', 'lng'
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function getLatAttribute()
	{
    	return floatval($this->attributes['lat']);
	}

	public function getLngAttribute()
	{
    	return floatval($this->attributes['lng']);
	}
}
