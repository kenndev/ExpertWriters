<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_name',
        'website_email',
        'writers_contact_email',
        'website_phone',
        'address',
        'country',
        'city',
        'postal_code',
        'description',
    ];
}
