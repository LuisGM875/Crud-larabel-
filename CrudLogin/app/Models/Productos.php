<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    // Instancio 'productos'
    protected $table = 'productos';
    protected $fillable = ['nombre', 'precio', 'descripcion', 'stock', 'categoria_id', 'imagenes', 'url'];

    // Relación One to Many (Uno a muchos), un registro puede tener muchas imágenes
    public function imagenesproductos()
    {
        return $this->hasMany('App\Models\Imgproductos');
    }
}
