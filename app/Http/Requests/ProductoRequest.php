<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
			'cod_barra' => 'required|string',
			'nombre' => 'required|string',
			'precio' => 'required|string',
			'descripcion' => 'required|string',
			'impuesto' => 'required',
			'imagen' => 'required|string',
			'categoria' => 'required|string',
			'proveedor' => 'required|string',
			'estado' => 'required|string',
			'placa' => 'required|string',
			'stock' => 'required',
			'pedido_id' => 'required',
        ];
    }
}
