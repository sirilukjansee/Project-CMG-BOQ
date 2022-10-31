<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportAuc extends Model
{
    use HasFactory;

    protected   $fillable = [
        'project_id',
        'template_id',
        'boq_id',
        'main_id',
        'remark'
    ];

    public function boq_a(){
        return $this->hasOne(Boq::class, 'id', 'boq_id');
    }
    public function main_a(){
        return $this->hasOne(catagory::class, 'id', 'main_id');
    }
    public function temp_a(){
        return $this->hasOne(template_boqs::class, 'id', 'template_id');
    }
    public function pro_a(){
        return $this->hasOne(Import_vender::class, 'id', 'project_id');
    }
    public function pro_a1(){
        return $this->hasOne(Import_vender::class, 'template_id', 'project_id');
    }
}
