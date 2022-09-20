<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class design_and_pm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected   $fillable = [
        'name',
        'email',
        'tel',
        'is_active',
        'create_by',
        'update_by'
    ];
}
