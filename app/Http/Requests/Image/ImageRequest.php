<?php

namespace App\Http\Requests\Image;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:20048'],
            'name' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Le champ image est obligatoire.',
            'image.image' => 'L\'image doit être une image.',
            'image.mimes' => 'L\'image doit être un fichier de type : jpeg, png, jpg, svg.',
            'image.max' => 'L\'image ne peut pas dépasser 20 048 kilo-octets.',
            'name.required' => 'Veuillez saisir un nom.',
            'name.string' => 'Veuillez saisir un nom.',
        ];
    }
}
