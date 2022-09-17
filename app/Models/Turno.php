<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'hora', 'guia_id', 'ruta_id'];

    public function guia(){
        return $this->belongsTo(Guia::class);
    }

    public function ruta(){
        return $this->belongsTo(Ruta::class);
    }

    public function inscripciones(){
        return $this->hasMany(Inscripcion::class);
    }

}
