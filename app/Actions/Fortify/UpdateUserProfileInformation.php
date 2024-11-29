<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  User  $user
     * @param  array<string, string|UploadedFile|null>  $input
     */
    public function update(User $user, array $input): void
    {
        // Validazione dei dati
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ])->validateWithBag('updateProfileInformation');
        
    
        // Aggiorna il nome e l'email
        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    
        // Aggiorna la password, se presente
        if (!empty($input['password'])) {
            $user->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();
        }
    
        // Gestione immagine di profilo
        if (isset($input['profile_image']) && $input['profile_image']->isValid()) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $user->profile_image = $input['profile_image']->store('profile_images', 'public');
            $user->save();
        }
    
        // Messaggio di successo
        session()->flash('success', 'Profilo aggiornato con successo!');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  User  $user
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
