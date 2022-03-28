<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_level',
        'deadline',
        'paper_type',
        'discipline',
        'no_of_pages',
        'topic',
        'paper_instruction',
        'paper_format',
        'no_of_sources',
        'no_of_charts',
        'no_of_power_point_slides',
        'price_per_page',
        'total_price',
        'order_id',
        'email',
        'payer_name',
        'status',
        'user_id',
    ];
}
