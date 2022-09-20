<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boq extends Model
{
    use HasFactory;

    protected   $fillable = [
        'template_boq_id',
        'main_id',
        'sub_id',
        'amount',
        'unit_id',
        'desc',
        'total',
        'status',
        'comment',
        'vender_id',
        'create_by',
        'update_by'
    ];

    public function main_cata(){
        return $this->hasOne(catagory::class,'id','main_id');
    }
    public function sub_cata(){
        return $this->hasOne(catagory_sub::class,'id','sub_id');
    }
    public function unit_u(){
        return $this->hasOne(Unit::class,'id','unit_id');
    }
    public function vender_n(){
        return $this->hasOne(Vender::class,'id','vender_id');
    }
    public function template(){
        return $this->hasOne(template_boqs::class,'id','template_boq_id');
    }
}


