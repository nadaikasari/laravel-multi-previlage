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
    
}
