<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class catagory_sub extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'code_criteria',
        'catagory_id',
        'name',
        'brand_id',
        'code_cat',
        'create_by',
        'update_by',
        'is_active'
    ];

    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }
}
