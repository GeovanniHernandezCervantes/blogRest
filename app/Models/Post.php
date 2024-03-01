<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    use HasFactory;

    
    protected $dateFormat = 'd-m-Y H:i:s';

    protected $fillable = [
        'autor',
        'fecha',
        'titulo',
        'contenido',
        'fotobase64',
        'created_at',
        'updated_at'
    ];

}
