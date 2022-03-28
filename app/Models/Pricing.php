<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_level',
        'deadline',
        'price',
    ];

    public function deadlineelate() {
        return $this->belongsTo('App\Models\Deadline');
    }
}
