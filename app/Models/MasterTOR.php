<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterTOR extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $tatle = 'master_t_o_r_s';
    protected   $fillable = [
        'message',
        'is_active',
        'remark',
        'create_by',
        'update_by'
    ];
}
