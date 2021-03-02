<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $table = 'operations';

    public function rol_oper(){
        return $this->hasMany(RolOperation::class , 'operation_id');
    }
}
