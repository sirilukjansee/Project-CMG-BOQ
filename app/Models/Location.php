<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    Protected $table = 'locations';
    protected $fillable = [
        'location_name',
        'is_active',
        'create_by',
        'update_by'
    ];

}
