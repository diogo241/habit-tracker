<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:4|max:60|confirmed',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'O nome é obrigatório',
      'name.max' => 'O nome deve ter no máximo 255 caracteres',
      'name.string' => 'O nome deve ser um texto válido',

      'email.unique' => 'O email já está em uso',
      'email.required' => 'O email é obrigatório',
      'email.email' => 'O email é inválido',

      'password.required' => 'A senha é obrigatória',
      'password.min' => 'A senha deve ter pelo menos 4 caracteres',
      'password.max' => 'A senha deve ter no máximo 60 caracteres',
      'password.confirmed' => 'A senha e a confirmação devem ser iguais',
    ];
  }
}
