<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
            'title' => $IsUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'description' => $IsUpdate ? 'sometimes|string' : 'required|string',
            'author' => $IsUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'year' => $IsUpdate ? 'sometimes|integer|min:0|max:' . date('Y') : 'required|integer|min:0|max:' . date('Y'),
            'genre' => $IsUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'author.required' => 'El autor es obligatorio.',
            'year.required' => 'El año de publicación es obligatorio.',
            'genre.required' => 'El género es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.min' => 'El año no puede ser negativo.',
            'year.max' => 'El año no puede ser mayor que el año actual.',
        ];
    }
}
