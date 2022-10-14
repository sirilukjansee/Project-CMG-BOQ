<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class catagory extends Model
{
    use HasFactory;
    use SoftDeletes;

    Protected $table = 'catagories';
    protected $fillable = [
        'code',
        'name',
        'create_by',
        'update_by',
        'is_active',
    ];

    public function catagory_sub(){
        return $this->hasMany(catagory_sub::class,'catagory_id','id');
    }
}
