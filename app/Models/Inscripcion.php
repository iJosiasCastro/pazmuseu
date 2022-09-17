<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'confirmada', 'turno_id'];


    public function turno(){
        return $this->belongsTo(Turno::class);
    }
}
