<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_remark extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'template_id',
        'status',
        'date',
        'approve_by',
        'create_by',
        'update_by',
        'comment',
    ];
    public function pro_log(){
        return $this->hasOne(Project::class,'id','project_id');
    }
}
