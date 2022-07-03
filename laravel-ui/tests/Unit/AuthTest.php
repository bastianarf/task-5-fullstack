<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_register()
    {
        User::where('email', 'aldhinyaldhi@gmail.com')->delete();

        $response = $this->post('/register', [
            'name' => 'aldhinya',
            'email' => 'aldhinyaldhi@gmail.com',
            'password' => 'aldhinya',
            'password_confirmation' => 'aldhinya'
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_login()
    {
        $response = $this->post('/login', [
            'email' => 'aldhinyaldhi@gmail.com',
            'password' => 'aldhinya',
        ]);

        $response->assertRedirect('/dashboard');
    }
}
