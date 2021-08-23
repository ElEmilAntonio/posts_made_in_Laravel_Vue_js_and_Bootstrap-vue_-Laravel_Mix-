<?php

namespace App\Http\Controllers;
use App\Models\Publicacion;
use App\Models\User;
use App\Models\Comentario;
use App\Http\Requests\CreateComentarioPost;
use Illuminate\Http\Request;
use redirect;

class ComentarioController extends Controller
{
 
    public function store(CreateComentarioPost $request){

      $validator =$request->validated();
      $comentario = new Comentario();
      $comentario->id_publicacion = $request->id;
      $comentario->comentario= $request->comentario;
      $comentario->name=User::where('id',auth()->id())->value('name');
      $comentario->save();
      return $comentario;
    }
}
