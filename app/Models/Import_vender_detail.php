<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import_vender_detail extends Model
{
    use HasFactory;

    Protected $table = 'import_vender_details';
    protected $fillable = [
        'import_id',
        'main_id',
        'sub_id',
        'width',
        'depth',
        'height',
        'amount',
        'unit_id',
        'desc',
        'wage_cost',
        'material_cost',
        'each_unit',
        'all_unit',
    ];

    public function cat_sub(){
        return $this->hasOne(catagory_sub::class,'id','sub_id');
    }
    public function unit_u(){
        return $this->hasOne(Unit::class,'id','unit_id');
    }
    public function pro_id(){
        return $this->hasOne(Import_vender::class,'id','import_id');
    }
}
