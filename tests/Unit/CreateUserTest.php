<?php

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class, WithFaker::class);
it('Can create new user', function () {
    $request = $this->post('/create-user', [
        'name' => $this->faker->name(),
        'email' =>  $this->faker->unique()->freeEmail(),
        'is_admin' => $this->faker->randomElement([0, 1]),
        'verified' =>  $this->faker->randomElement([0, 1]),
        'code' => \App\Services\Utility::generateInteger(6),
        'phone' => \App\Services\Utility::generateInteger(11),
        'password' =>  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    ]);
    $request->assertStatus(200);
    $user = \App\Models\User::latest()->first();
    expect($user->phone)->toBeString()->toHaveLength(11);
    expect($user->is_admin)->toBeIn([0,1]);
});