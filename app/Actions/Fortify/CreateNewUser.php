<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string|UploadedFile|null>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ])->validate();

        // Gestisci il caricamento dell'immagine di profilo, se presente
        $profileImagePath = null;
        if (isset($input['profile_image']) && $input['profile_image']->isValid()) {
            $profileImagePath = $input['profile_image']->store('profile_images', 'public');
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'profile_image' => $profileImagePath,
        ]);
    }
}
