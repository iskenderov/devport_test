<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use DatabaseTransactions;

    public function test_open_dashboard_from_admin()
    {
        $user = User::create([
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'isAdmin' => true,
            'secure_key' => md5(Hash::make('password')),
            'expired_at' => now()->addDays(7)
        ]);

        Auth::login($user);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_users_link_exist()
    {
        $user = User::create([
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'isAdmin' => true,
            'secure_key' => md5(Hash::make('password')),
            'expired_at' => now()->addDays(7)
        ]);

        Auth::login($user);

        $response = $this->get('/');

        $response->assertSee('user');
    }
}
