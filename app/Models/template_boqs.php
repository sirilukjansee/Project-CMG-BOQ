<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class template_boqs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $tatle = 'template_boqs';
    protected   $fillable = [
        'number_id',
        'project_id',
        'name',
        'date',
        'status',
        'comment',
        'overhead',
        'discount',
        'budget',
        'vender_id',
        'ref_template',
        'approve_by',
        'approve_at',
        'create_by',
        'update_by'
    ];

    public function project(){
        return $this->hasOne(Project::class,'id','project_id');
    }
    public function vender_name(){
        return $this->hasOne(Vender::class,'id','vender_id');
    }
    public function cat_sub(){
        return $this->hasMany(Boq::class,'template_boq_id','id');
    }
    public function cat_sub1(){
        return $this->hasOne(Boq::class,'template_boq_id','id');
    }
    public function vender_auc(){
        return $this->hasOne(Import_vender::class, 'id_project', 'project_id');
    }
    public function vender_auc1(){
        return $this->hasOne(Import_vender::class, 'template_id', 'project_id');
    }
    public function vender_auc2(){
        return $this->hasOne(Import_vender::class, 'template_id', 'id');
    }
}
