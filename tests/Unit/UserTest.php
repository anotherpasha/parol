<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = create('App\Models\User');
    }

    /** @test */
    public function user_has_roles()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->user->roles
        );
    }


}
