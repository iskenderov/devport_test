<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateSecureKeyAction
{
    public function __invoke(User $user, string $token): User
    {
        $user->update([
            'secure_key' => md5(Hash::make($token)),
        ]);

        return $user;
    }
}
