<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        //dd($this->route('usuario'));
        return [

            'id' => [
                'required',
                //'unique:users,id_usuario',
                'min:1000000',                
                'numeric',
                
                Rule::unique('users','id_usuario')->ignore($this->route('usuario'))
                                
            ],
            'name'=>[
                'required'
            ],

            'email'=>[
                'required',
                'email',
                
                Rule::unique('users','email')->ignore($this->route('usuario'))
            ]
        ];
    }
    public function messages()
    {
        return [
            'id.required'=>'La identificación del usuario es obligatoria',
            'id.unique'=>'El numero de identificación ya esta registrado',
            'id.numeric'=>'La identificación del usuario debe ser numerico',
            'id.min'=>'La identificación debe tener al menos 7 numeros',
            'id.max'=>'La identificación debe tener maximo 15 numeros',
            'name.required'=>'El nombre de usuario es obligatorio',
            'email.required'=>'El email es obligatorio',
            'email.email'=>'El email no es valido',
            'email.unique'=>'El correo electronico ya esta asociado a una cuenta'
        ];
    }
}
