<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = ['nombre', 'descripcion_corta', 'descripcion_larga'];

    public function productos()
    {
        return $this->hasMany(Productos::class);
    }

}
