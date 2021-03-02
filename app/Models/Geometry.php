<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geometry extends Model
{
    use HasFactory;

    protected $table = 'geometries';

    protected $fillable = [
        'altura',
        'espaciamiento',
        'gap',
        'angulo',
        'lot_id',
    ];

    public function lote(){
        return $this->belongsTo(Lot::class , 'lot_id');
    }
}
