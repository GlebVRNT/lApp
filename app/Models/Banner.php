<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'target_url',
        'img_url',
        'cpm',
        'views_limit'
    ];

    use HasFactory;
    
}
