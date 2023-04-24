<?php

declare(strict_types=1);

namespace App\Actions\User;

class SaveNewPassword
{
        private string $email;
        private string $password;
        public function __construct(string $email, string $password)
        {
                $this->email = $email;
                $this->password = $password;
        }
        public function __invoke()
        {
                // reset the password
                $user = \App\Models\User::where('email', $this->email)->first();
                $user->password = \Illuminate\Support\Facades\Hash::make($this->password);
                $user->save();
        }
}