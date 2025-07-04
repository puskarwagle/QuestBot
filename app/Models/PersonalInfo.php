<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'current_city',
        'street',
        'state',
        'zipcode',
        'country',
        'ethnicity',
        'gender',
        'disability_status',
        'veteran_status',
    ];
}

