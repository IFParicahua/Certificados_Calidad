<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolOperation extends Model
{
    use HasFactory;

    protected $table = 'rol_operations';

    public function roles(){
        return $this->belongsTo(Rol::class , 'rol_id');
    }

    public function operations(){
        return $this->belongsTo(Operation::class , 'operation_id');
    }
}
