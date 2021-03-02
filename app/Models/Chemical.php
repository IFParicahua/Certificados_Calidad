<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    use HasFactory;

    protected $table = 'chemical';

    protected $fillable = [
        'c',
        'mn',
        'si',
        'p',
        's',
        'lot_id',
    ];

    public function lote(){
        return $this->belongsTo(Lot::class , 'lot_id');
    }
}
