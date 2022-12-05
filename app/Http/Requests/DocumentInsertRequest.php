<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentInsertRequest extends FormRequest
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
        return [
            'servicio'=>'required',
            'id_medico'=>[
                'required',
                'min:7'
            ],
            'nombre'=>'required',
            'id_paciente'=>'required',
            'fecha'=>'required',
            'valor'=>[
                'required',
                'numeric',
                'min:10000',
                'max:100000'
            ],
            'documento'=>[
                'mimes:pdf,doc,docx,xlsx',
                'required'
            ]

        ];
    }

    public function messages()
    {
        return [
            'servicio.required'=>'El tipo de esrvicio es obligatorio',
            'id_medico.required'=>'La identificacion del profesional es obligatorio',
            'id_medico.min'=>'La identificacion debe tener minimo 7 caracteres',
            'nombre.required'=>'El nombre del profesional es obligatorio',
            'id_paciente.required'=>'La identificación del paciente es obligatoria',
            'fecha.required'=>'la fecha es obligatoria',
            'valor.required'=>'El valor del servicio es obligatorio',
            'documento.required'=>'El documento a subir es obligatorio',
            'documento.mimes'=>'El tipo de documento debe ser PDF, Excel, Word',
            'valor.min'=>'El valor debe ser mayor o igual a 10000',
            'valor.max'=>'El valor debe ser menor o igual a 100000',
        ];
    }
}
