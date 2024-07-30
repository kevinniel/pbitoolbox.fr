<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
            'key' => ['required', 'string'],
//            'user_id' => ['required', 'integer', 'exists:users,id'],
//            'workspace_id' => ['required', 'integer', 'exists:workspaces,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Le commentaire est obligatoire.',
            'content.string' => 'Le commentaire doit être une chaîne de caractères.',
            'key.required' => 'La clé est obligatoire.',
            'key.string' => 'La clé doit être une chaîne de caractères.',
//            'user_id.required' => 'User ID is required',
//            'user_id.integer' => 'User ID must be an integer',
//            'user_id.exists' => 'User ID does not exist',
//            'workspace_id.required' => 'Workspace ID is required',
//            'workspace_id.integer' => 'Workspace ID must be an integer',
//            'workspace_id.exists' => 'Workspace ID does not exist',
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
