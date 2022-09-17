<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ruta extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'image_url'];
    use Sluggable;
    use HasFactory;

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

    public function exposicions(){
        return $this->belongsToMany(Exposicion::class, 'exposicion_ruta');
    }
    
}
