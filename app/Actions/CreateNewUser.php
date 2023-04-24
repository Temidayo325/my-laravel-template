<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateNewUser
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    private object $request;
    public function __construct(\App\Http\Requests\User\UserRegisterRequest $input)
    {
        $this->request =  (object) $input;
    }
    public function __invoke()
    {
        try {
            $checkRole = \App\Services\checkRole::check($this->request->email);
            $user =  User::create([
                'name' => $this->request->name,
                'email' =>  $this->request->email,
                'is_admin' => $checkRole[0],
                'verified' => 0,
                'code' => \App\Services\Utility::generateInteger(6),
                'phone' =>  $this->request->phone,
                'password' => Hash::make($this->request->password),
            ]);
            $role = \App\Models\Role::whereRole($checkRole[1])->first();
            $user->role()->attach($role);
            return $user;
        } catch (\Exception $e) {
            throw new \App\Exception\CreateUserException();
        }
    }
}