<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $table = 'lots';

    public function producto(){
        return $this->belongsTo(Product::class , 'product_id');
    }

    public function certificado(){
        return $this->belongsTo(Certification::class , 'certicado_id');
    }

    public function geometries(){
        return $this->hasMany(Geometry::class , 'lot_id');
    }

    public function chemicals(){
        return $this->hasMany(Chemical::class , 'lot_id');
    }

    public function mechanics(){
        return $this->hasMany(Mechanic::class , 'lot_id');
    }

    public function paquete(){
        return $this->hasMany(Package::class , 'lots_id');
    }

    public function imprimir(){
        return $this->belongsTo(Imprimir::class , 'print_id');
    }
}
