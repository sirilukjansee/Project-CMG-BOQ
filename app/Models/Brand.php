<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    Protected $table = 'brands';
    protected $fillable = [
        // 'code',
        'brand_name',
        'is_active',
        'create_by',
        'update_by'
    ];


}
