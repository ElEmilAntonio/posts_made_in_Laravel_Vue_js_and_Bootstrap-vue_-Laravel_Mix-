<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePublicacionPost extends FormRequest
{
 public $rules=[
 'mensaje' => ['string', 'max:500'],
 'imagen'=>['nullable']
];


    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return $this->rules;
    }
}
