<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'social_name', 'social_url', 'social_icon'
    ];
}
