<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     ! Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     ! Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function getUserImage()
    {
        return [
            'email' => $this->get('email'),
            'username' => $this->get('username'),
            'password' => $this->get('password'),
            'password_confirmation' => $this->get('password_confirmation'),
            'image' => '/assets/img/usuario.png',
        ];
    }
}
