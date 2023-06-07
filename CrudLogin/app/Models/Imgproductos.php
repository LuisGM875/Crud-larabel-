<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgproductos extends Model
{
    use HasFactory;
    protected $table = 'img_productos';

    // Declaro los campos que usaré de la tabla 'img_productos'
    protected $fillable = ['nombre', 'formato', 'productos_id'];

    // Relación Inversa
    public function productos()
    {
        //belongs to que pertenece a
        return $this->belongsTo('App\Models\Productos');
    }
}
