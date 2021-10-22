<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LoginFormRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => ['required', 'string', 'min:8']
        ];
    }

    /**
     * Check if credentials are valid.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $credentials = $this->only('email', 'password');

        if (!auth()->attempt(array_merge($credentials, ['type' => User::TYPE_EMPLOYEE]))) {
            if (!auth()->guard('admin')->attempt(array_merge($credentials, ['type' => User::TYPE_ADMIN]))) {
                throw ValidationException::withMessages(['login' => __('auth.failed')]);
            }
        }
    }
}
