<?php

namespace App\Http\Requests\Stat;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'report' => ['nullable', 'string'],
            'tab' => ['nullable', 'string'],
            'additionalFields' => ['nullable', 'array'],
            'remoteAddr' => ['nullable', 'string'],
            'httpAcceptLanguage' => ['nullable', 'string'],
            'httpUserAgent' => ['nullable', 'string'],
            'httpSecChUa' => ['nullable', 'string'],
            'httpSecChUaPlatform' => ['nullable', 'string'],
            'userId' => ['nullable', 'string'],
            'workspace' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'report.string' => 'Le rapport doit être une chaîne de caractères.',
            'tab.string' => 'Le champ tab doit être une chaîne de caractères.',
            'additionalFields.string' => 'Les champs supplémentaires doivent être une chaîne de caractères.',
            'remoteAddr.string' => 'L\'adresse IP doit être une chaîne de caractères.',
            'httpAcceptLanguage.string' => 'La langue doit être une chaîne de caractères.',
            'httpUserAgent.string' => 'L\'agent utilisateur doit être une chaîne de caractères.',
            'httpSecChUa.string' => 'Le navigateur doit être une chaîne de caractères.',
            'httpSecChUaPlatform.string' => 'La plateforme doit être une chaîne de caractères.',
            'userId.string' => 'L\'identifiant de l\'utilisateur doit être une chaîne de caractères.',
            'workspace.string' => 'L\'espace de travail doit être une chaîne de caractères.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
