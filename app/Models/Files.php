<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_url',
        'order_id',
        'file_name',
        'file_name_system'
    ];
}
