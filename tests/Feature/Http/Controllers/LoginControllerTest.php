<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Requests\LoginRequest;
use app\Models\User;
use Tests\TestCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Mockery;
use Mockery\MockInterface;

class LoginControllerTest extends TestCase
{

    public function testShowLoginPge()
    {
        $response = $this->get('/login');

        $response->assertOk();
        $response->assertViewIs('auth.login');
    }


    public function testUserLoginWithValidCredentials()
    {
        // Create a mock LoginRequest object with the necessary data
        $requestData = [
            'email' => 'john@gmail.com',
            'password' => 'password',
        ];
        $request = new LoginRequest($requestData);

        // Mock the Auth facade's validate method to return true
        Auth::shouldReceive('validate')->once()->andReturn(true);

        // Mock the Auth facade's getProvider method to return a User model instance
        Auth::shouldReceive('getProvider')->once()->andReturn(User::class);

        // Mock the Auth facade's retrieveByCredentials method to return the User model instance
        Auth::shouldReceive('getProvider->retrieveByCredentials')->once()->andReturn(new User());

        // Mock the Auth facade's login method
        Auth::shouldReceive('login')->once();

        // Call the login method
        $response = $this->call('POST', '/login', $request->all());

        // Assert that the user is redirected to the intended page
        $response->assertRedirect();
    }

}
