<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AnimalDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    public function prepareForValidation()
    {
        if ($this->has('name')) {
            $this->merge([
                'name' => Str::title(trim($this->input('name'))),
            ]);
        }
        if ($this->has ('species')) {
            $this->merge([
                'species' => str::lower( trim($this->input('species'))),
            ]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                   
            'name' => ['required', 'string', 'max:100'],
            'species' => ['required', 'string', 'max:100'],
            'edad' => ['required', 'integer', 'min:0'],

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del animal es obligatorio.',
            'name.string' => 'El nombre del animal debe ser una cadena de texto.',
            'name.max' => 'El nombre del animal no puede tener más de 100 caracteres.":input" no esta permitido',
            'species.required' => 'La especie del animal es obligatoria.',
            'species.string' => 'La especie del animal debe ser una cadena de texto.',
            'species.max' => 'La especie del animal no puede tener más de 100 caracteres.',
            'edad.required' => 'La edad del animal es obligatoria.',
            'edad.integer' => 'La edad del animal debe ser un número entero.',
            'edad.min' => 'La edad del animal no puede ser menor a :min años.',
        ];
    }
}
