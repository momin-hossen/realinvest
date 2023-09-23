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
        'thumbnail',
        'preview',
        'invest_type',
        'capital_back',
        'min_invest',
        'max_invest',
        'max_invest_amount',
        'is_period',
        'period_duration',
        'profit_range',
        'loss_range',
        'status',
        'accept_new_investor',
        'accept_installments',
        'address',
    ];
}
