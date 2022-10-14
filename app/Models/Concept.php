<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concept extends Model
{
    use HasFactory;
    use SoftDeletes;

    Protected $table = 'concepts';
    protected $fillable = [
        'name',
        'is_active',
        'create_by',
        'update_by',
        'is_active',
    ];
}
