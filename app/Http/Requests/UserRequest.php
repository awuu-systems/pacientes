<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'DUI'=>'required|string',
            'password'=>'required|string',
            'nombre'=>'required|string',
            'apellidos'=>'required|string',
            'email'=>'required|email',
            'fecha_nacimiento'=>'required|date',
            'id_rol'=>'required|integer',
            'foto_url'=>'required|string',
            'diagnostico'=>'string',
            'peso'=>'string',
            'alergias'=>'string',
            'id_especialidad'=>'integer'
        ];
    }
}
