<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'phone_number',
        'address_detail',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'latitude',
        'longitude',
        'is_default',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
