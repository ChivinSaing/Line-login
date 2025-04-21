<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'salon_name',
        'salon_address',
        'salon_website1',
        'salon_website2',
    ];

}
