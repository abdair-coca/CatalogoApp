<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
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
            'categoria_id' => [
                'required',
                'exists:categorias,id'
            ],

            'nombre' => [
                'required',
                'string',
                'max:150'
            ],

            'sku' => [
                'required',
                Rule::unique('productos')->ignore($this->producto)
            ],

            'precio' => [
                'required',
                'numeric',
                'min:0'
            ],

            'stock' => [
                'required',
                'integer',
                'min:0'
            ],

            'disponible' => [
                'nullable',
                'boolean'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría no existe.',

            'nombre.required' => 'El nombre es obligatorio.',

            'sku.required' => 'El SKU es obligatorio.',
            'sku.unique' => 'El SKU ya existe.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser numérico.',
            'precio.min' => 'El precio no puede ser negativo.',

            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser entero.',
            'stock.min' => 'El stock no puede ser negativo.',
        ];
    }
}