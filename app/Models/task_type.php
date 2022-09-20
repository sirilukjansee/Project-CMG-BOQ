<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class task_type extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected   $fillable = [
        'task_type_name',
        'create_by',
        'update_by'
    ];
}
