<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class CommandeRequest extends FormRequest
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
            'type_colis' => 'required|string|max:255',
            'durabilite' => 'required|integer|min:0|max:100',
            'description' => 'nullable|string',
            'date_de_livraison' => 'required|date',
            'heure_livraison' => 'required|string|',
            'poids_colis' => 'required|string',
            'lieu_livraison'=>'required|string'
        ];
    }
}