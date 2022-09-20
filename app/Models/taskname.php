<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class taskname extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected   $fillable = [
        'task_name',
        'create_by',
        'update_by'
    ];
}
