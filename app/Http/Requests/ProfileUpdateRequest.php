<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'username' => ['string', 'min:5', 'max:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'avatar' => ['image', 'file', 'dimensions:width=200,height=200'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'avatar.dimensions' => 'Please Make Sure The Image Dimension Is 200 x 200.',
        ];
    }
}
