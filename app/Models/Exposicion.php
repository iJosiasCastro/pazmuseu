<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Exposicion extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'image_url', 'game_url'];
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function valoracions(){
        return $this->hasMany(Valoracion::class);
    }

    public function rutas(){
        return $this->belongsToMany(Ruta::class, 'exposicion_ruta');
    }
}
