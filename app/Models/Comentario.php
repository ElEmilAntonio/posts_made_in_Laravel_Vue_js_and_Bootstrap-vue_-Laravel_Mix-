<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
     protected $fillable=[
        'id',
        'id_publicacion',
        'name',
        'comentario',
    ];
    public $timestamps = false;
}