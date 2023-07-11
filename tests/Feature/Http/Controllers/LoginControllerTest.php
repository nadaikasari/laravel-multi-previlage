<?php

namespace Tests\Feature\Http\Controllers;

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
    
    // public function testLoginSuccessful()
    // {
        // Mock the necessary objects and dependencies
        // $request = $this->getMockBuilder(Request::class)->getMock();
        // $loginRequest = $this->getMockBuilder(LoginRequest::class)->getMock();
        // $auth = $this->getMockBuilder(Auth::class)
        //     ->disableOriginalConstructor()
        //     ->getMock();

        // // Set up expectations for the mock objects
        // $credentials = ['email' => 'test@example.com', 'password' => 'password'];
        // $request->expects($this->once())->method('getCredentials')->willReturn($credentials);
        // $request->expects($this->once())->method('get')->with('remember')->willReturn(true);
        // $loginRequest->expects($this->once())->method('getCredentials')->willReturn($credentials);
        // Auth::expects($this->once())->method('validate')->with($credentials)->willReturn(true);
        // Auth::expects($this->once())->method('getProvider')->willReturnSelf();
        // Auth::expects($this->once())->method('retrieveByCredentials')->with($credentials)->willReturn($user);
        // Auth::expects($this->once())->method('login')->with($user, true);

        // Make a POST request to the login route
        // $response = $this->post('/login', [
        //     'email' => 'test@example.com',
        //     'password' => 'password',
        //     'remember' => true
        // ]);

        // // Assert that the response is a redirect
        // $response->assertRedirect();

        // // Assert that the intended URL after login is the default one
        // $response->assertRedirect('/');
    // }
}
