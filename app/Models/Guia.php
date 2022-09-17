<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    protected $fillable = ['name', 'image_url', 'email', 'idioma'];
    use HasFactory;
}
