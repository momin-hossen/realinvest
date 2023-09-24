<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'gallery_image',
        'thumbnail_image',
        'preview_image',
        'invest_type',
        'capital_back',
        'min_invest',
        'max_invest',
        'max_invest_amount',
        'is_period',
        'profit_range',
        'loss_range',
        'location',
        'address',
        'description',
    ];
}
