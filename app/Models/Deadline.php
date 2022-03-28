<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;

    protected $fillable = [
        'deadline',
    ];

    public function pricing() {
        return $this->hasMany('App\Models\Pricing');
    }
}
