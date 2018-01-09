<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected $collectionClass = 'Illuminate\Database\Eloquent\Collection';

    protected function setUp()
    {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\Models\User');

        $this->actingAs($user);

        return $this;
    }

    protected function signInAsAdmin()
    {
        $role = Role::where('name', 'admin')->first();
        $user = create('App\Models\User')->assignRole($role);
        $this->signIn($user);
        return $this;
    }

    // // Hat tip, @adamwathan.
    // protected function disableExceptionHandling()
    // {
    //     $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

    //     $this->app->instance(ExceptionHandler::class, new class extends Handler {
    //         public function __construct() {}
    //         public function report(\Exception $e) {}
    //         public function render($request, \Exception $e) {
    //             throw $e;
    //         }
    //     });
    // }

    // protected function withExceptionHandling()
    // {
    //     $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

    //     return $this;
    // }
}
