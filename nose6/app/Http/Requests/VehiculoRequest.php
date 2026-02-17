<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $IsUpdate = $this->isMethod('put') || $this->isMethod('patch');
        return [
            'marca' => $IsUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'modelo' => $IsUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'color' => $IsUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'version' => $IsUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'anio' => $IsUpdate ? 'sometimes|integer|min:1886|max:' . date('Y') : 'required|integer|min:1886|max:' . date('Y')
        ];
    }
    public function messages(): array
    {
        return [
            'marca.required' => 'La marca es obligatoria.',
            'modelo.required' => 'El modelo es obligatorio.',
            'color.required' => 'El color es obligatorio.',
            'version.required' => 'La versión es obligatoria.',
            'anio.required' => 'El año es obligatorio.',
            'anio.integer' => 'El año debe ser un número entero.',
            'anio.min' => 'El año no puede ser anterior a 1886.',
            'anio.max' => 'El año no puede ser mayor que el año actual.',
        ];
    }
}
