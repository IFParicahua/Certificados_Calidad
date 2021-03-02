<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $table = 'certifications';

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function aprobado(){
        return $this->belongsTo(User::class , 'aprobado_id');
    }


    public function cliente(){
        return $this->belongsTo(Client::class , 'cliente_id');
    }


    public function lotes(){
        return $this->hasMany(Lot::class , 'certicado_id');
    }
}
