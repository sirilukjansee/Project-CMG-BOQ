<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capex extends Model
{
    use HasFactory;

    protected $table = 'capexes';
    protected $fillable = [
        'project_id',
        'template_id',
        'boq_id',
        'total',
        'remark',
        'create_by',
        'update_by'
    ];
}
