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

    public function catagory(){
        return $this->hasOne(catagory::class,'id','boq_id');
    }
    public function project_n(){
        return $this->hasOne(Brand::class, 'id','project_id');
    }
    public function pro_c(){
        return $this->hasOne(Project::class, 'id','project_id');
    }
}
