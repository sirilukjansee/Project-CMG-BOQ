<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import_vender extends Model
{
    use HasFactory;

    Protected $table = 'import_venders';
    protected $fillable = [
        'id_project',
        'id_vender',
        'remark',
        'overhead',
        'discount',
        'create_by',
    ];

    public function vender_name(){
        return $this->hasOne(Vender::class,'id','id_vender');
    }
}
