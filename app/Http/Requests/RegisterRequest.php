<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
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
            // "name" => ["required", "string", "max:255"],
            "name" => "required|string|max:255",
            "email" => "required|string|lowercase|email|max:255|unique:users",
            // "password" => "required|confirmed",
            "password" => [
                "required", 
                "confirmed", 
                Password::default(), // équivaut  min(8)
                // Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ];
    }

    /**
     * Une fonction qui s'exécute après la validation
     * des données
     */
    protected function passedValidation(): void {
        $this->merge([
            "password", bcrypt($this->password),
        ]);
    }

    // public function after() {
    //     return [
    //         function() {
    //             $this->merge(["test" => "Test"]);
    //         }
    //     ];
    // }
}
