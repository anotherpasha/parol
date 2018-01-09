<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionTest extends TestCase
{
    use DatabaseMigrations;

    protected $permission;

    protected function setUp()
    {
        parent::setUp();
        $permissionModel = 'Spatie\Permission\Models\Permission';
        $this->permission = create($permissionModel);
    }

    /** @test */
    function permission_has_users()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->permission->users
        );
    }

    /** @test */
    public function permission_has_role()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->permission->roles
        );
    }
}
