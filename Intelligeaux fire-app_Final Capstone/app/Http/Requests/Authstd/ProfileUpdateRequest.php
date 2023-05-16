<?php

namespace App\Http\Requests\Authstd;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(Student::class)->ignore($this->user()->id)],
        ];
    }
}
