<?php

namespace App\Http\Requests\Workspace;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkspaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('workspaces')->ignore($this->workspace)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Veuillez saisir un nom.',
            'name.string' => 'Veuillez saisir un nom.',
            'name.unique' => 'Ce nom existe déjà.',
        ];
    }
}
