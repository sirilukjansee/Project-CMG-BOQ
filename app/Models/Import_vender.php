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
        'template_id',
        'remark',
        'overhead',
        'budget',
        'discount',
        'create_by',
    ];

    public function vender_name(){
        return $this->hasOne(Vender::class,'id','id_vender');
    }
    public function project(){
        return $this->hasOne(Project::class,'id','id_project');
    }
    public function vender_d(){
        return $this->hasOne(Import_vender_detail::class, 'import_id','id');
    }
    public function template_d(){
        return $this->hasOne(template_boqs::class, 'id','template_id');
    }
}
