<?php

namespace App\Http\Controllers;
use App\Models\Publicacion;
use App\Http\Requests\CreatePublicacionPost;
use App\Http\Traits\TraitImageManagement;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comentario;
use redirect;

class PublicacionController extends Controller
{
   use TraitImageManagement;


    public function index(){
    $publicaciones = Publicacion::get();
    $otraspublicaciones =collect();
    foreach( $publicaciones as $publicacion){
    $usuario = User::findOrFail($publicacion->user_id);
    $publicacion['user']=$usuario;
    $publicacion['comentarios'] = Comentario::where('id_publicacion',$publicacion->id)->get();
    $concact=collect($publicacion);
    $otraspublicaciones->push($concact); 
    }

    $values = $otraspublicaciones->values();
    return $values;
    }

    public function store(CreatePublicacionPost $request){

      $validator =$request->validated();
      $fileName=$this->StoreImage($request->imagen);
      $publicacion = new Publicacion();
      $publicacion->user_id = auth()->id();
      $publicacion->mensaje= $request->mensaje;
      $publicacion->imagen = $fileName;
      $publicacion->save();
      $user = $publicacion->user;
      $user['name'] = User::findOrFail(auth()->id())->value('name');
      $publicacion->user = $user;
      $publicacion['comentarios'] = [];
      return $publicacion;
    }

    public function update(CreatePublicacionPost $request, $id){
         
    $validator =$request->validated();
    $publicacion=Publicacion::findOrFail($id);
    $publicacion->mensaje= $request->mensaje;
    if($publicacion->imagen && $request->imagen) $this->DestroyImage($publicacion->imagen);
    $publicacion->imagen=$this->StoreImage($request->imagen);
    $publicacion->update();
    }

    public function destroy($id)
    {
        //
    }
}
