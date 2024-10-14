<?php

namespace Tests\Unit\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Closure;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


class RoleMiddlewareTest extends TestCase
{
    //use RefreshDatabase;

    public function test_user_with_correct_role_can_access_route(): void
    {
        $user = User::factory()->create(['role' => 'admin', 'active'=>1]);
        Auth::login($user);

        // Create a request instance
        $request = Request::create('/some-url', 'GET');

        // Mock the application container
        $app = \Illuminate\Container\Container::getInstance();
        $responseFactory = $this->createMock(ResponseFactory::class);
        $app->instance(ResponseFactory::class, $responseFactory);

        // Create a closure that returns a response
        $next = function ($request) {
            return response('Next middleware called');
        };

        // Create an instance of the middleware
        $middleware = new RoleMiddleware();

        // Call the handle method
        $response = $middleware->handle($request, $next, 'admin');

        // Assert the response
        $this->assertEquals('Next middleware called', $response->getContent());
    }

    public function test_user_with_incorrect_role_cannot_access_route(): void
    {
        $user = User::factory()->create(['role' => 'user', 'active'=>1]);
        Auth::login($user);

        // Create a request instance
        $request = Request::create('/some-url', 'GET');

        // Mock the application container
        $app = \Illuminate\Container\Container::getInstance();
        $responseFactory = $this->createMock(ResponseFactory::class);
        $app->instance(ResponseFactory::class, $responseFactory);

        // Create a closure that returns a response
        $next = function ($request) {
            return response('Next middleware called');
        };

        // Create an instance of the middleware
        $middleware = new RoleMiddleware();

        // Call the handle method
        $response = $middleware->handle($request, $next, 'admin');

        // Assert the response
        $this->assertEquals('Unauthorized', $response->getContent());
    }
}