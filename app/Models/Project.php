<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;

    Protected $table = 'projects';
    protected   $fillable = [
        // 'project_id',
        'brand',
        'concept',
        'number_id',
        'location',
        'area',
        'unit',
        'io',
        'task',
        'task_n',
        'start_date',
        'finish_date',
        'all_date',
        'open_date',
        'designer_name',
        'project_manager',
        'total',
        'create_by',
    ];

    public function brand_master(){
        return $this->hasOne(Brand::class,'id','brand');
    }

    public function concept_master(){
        return $this->hasOne(Concept::class,'id','concept');
    }

    public function location_master(){
        return $this->hasOne(Location::class,'id','location');
    }

    public function task_type_master(){
        return $this->hasOne(task_type::class,'id','task');
    }

    public function task_name_master(){
        return $this->hasOne(taskname::class,'id','task_n');
    }

    public function designer_master(){
        return $this->hasOne(design_and_pm::class,'id','designer_name');
    }

    public function project_id1(){
        return $this->hasOne(template_boqs::class,'project_id','id');
    }
}
