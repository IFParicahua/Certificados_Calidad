<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imprimir extends Model
{
    use HasFactory;

    protected $table = 'print';

    public function lote(){
        return $this->hasOne(Lot::class , 'print_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
