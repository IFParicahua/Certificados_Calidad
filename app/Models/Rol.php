<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public function users(){
        return $this->hasMany(User::class , 'user_id');
    }

    public function rol_ops(){
        return $this->hasMany(RolOperation::class , 'rol_id');
    }
}
