<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Response;
trait TraitImageManagement{

public function StoreImage($Image){
$fileName=null;
if(File::exists($Image)){
$fileName =auth()->id().time().$Image->getClientOriginalName();
Storage::disk('local')->putFileAs("/images/",$Image,$fileName);
}
return $fileName;
}

public function DestroyImage($fileName){
return File::delete($file);
}

}