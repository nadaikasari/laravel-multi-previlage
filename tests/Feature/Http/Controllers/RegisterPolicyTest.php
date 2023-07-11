<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\RegisterController;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterPolicyTest extends TestCase
{

    public function testShowRegisterPage()
    {
        $response = $this->get('/register');

        $response->assertOk();
        $response->assertViewIs('auth.register');
    }

    public function testRegistersaNewUserAndRedirectsToHomepage()
    {
        $requestData = [
            'email'                 => 'john@gmail.com',
            'name'                  => 'John Doe',
            'username'              => 'John Doe',
            'password'              => 'password',
            'password_confirmation' => 'password',
            'role_id'               => 1
        ];

        $response = $this->post('/register', $requestData);

        
        $response->assertStatus(302); // Check if the response is a redirect
        $response->assertRedirect('/'); // Check if the user is redirected to the homepage
        $response->assertSessionHas('success', 'Account successfully registered.'); // Check if the success message is stored in the session

        $this->assertAuthenticated(); // Check if the user is authenticated
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
        ]);
        // $this->withoutExceptionHandling();
    }
}
