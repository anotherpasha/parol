<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends TestCase
{
    use DatabaseMigrations;

    protected $role;

    protected function setUp()
    {
        parent::setUp();
        $this->role = create('Spatie\Permission\Models\Role');
    }

    /** @test */
    public function role_has_permissions()
    {
        $this->assertInstanceOf(
            $this->collectionClass, $this->role->permissions
        );
    }

    /** @test */
    public function role_has_users()
    {
        $this->assertInstanceOf(
            $this->collectionClass, $this->role->users
        );
    }
}
