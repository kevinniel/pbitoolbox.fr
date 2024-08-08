<?php

namespace App\Http\Requests\Authorisation;

use Illuminate\Foundation\Http\FormRequest;

class AuthorisationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'can_access_image' => ['boolean', 'required'],
            'can_access_comment' => ['boolean', 'required'],
            'can_access_stat' => ['boolean', 'required'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'can_access_image' => $this->boolean('can_access_image'),
            'can_access_comment' => $this->boolean('can_access_comment'),
            'can_access_stat' => $this->boolean('can_access_stat'),
        ]);
    }
}
