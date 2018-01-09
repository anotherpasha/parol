<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    protected $roleModel = 'Spatie\Permission\Models\Role';
    protected $permissionModel = 'Spatie\Permission\Models\Permission';

    /** @test */
    public function unauthorized_user_may_not_create_role()
    {
        $this->signIn();
        $this->withExceptionHandling();

        $this->get('/roles/create')
            ->assertStatus(403);

        $this->post('/roles')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_create_role()
    {
        $this->signInAsAdmin()
            ->withExceptionHandling();

        $this->get('roles/create')
            ->assertStatus(200);

        $role = make($this->roleModel, ['name' => 'newrole'])->toArray();
        $this->publishRole($role);
        $this->assertDatabaseHas('roles', ['name' => 'newrole']);
    }

    /** @test */
    public function a_role_requires_permissions()
    {
        $this->withExceptionHandling()->signInAsAdmin();
        $role = make($this->roleModel);
        $this->post('roles', $role->toArray())
            ->assertSessionHasErrors('permissions');
    }

    /** @test */
    public function saved_role_has_expected_permission()
    {
        $permission = create($this->permissionModel);
        $role = create($this->roleModel);
        $role->givePermissionTo($permission->name);

        $this->assertEquals($role->permissions->first()->id, $permission->id);
    }

    /** @test */
    public function unauthorized_user_may_not_edit_role()
    {
        $this->signIn()
            ->withExceptionHandling();

        $role = create($this->roleModel);

        $this->get('roles/' . $role->id . '/edit')
            ->assertStatus(403);

        $this->post('roles/' . $role->id . '/update')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_edit_role()
    {
        $this->signInAsAdmin()->withExceptionHandling();

        $permission = create($this->permissionModel);
        $pluckedPermissions = $permission->pluck('name');
        $role = create($this->roleModel);
        $role->givePermissionTo($permission->name);
        $this->get('roles/' . $role->id . '/edit')
            ->assertStatus(200);

        $newRole = $role->toArray();
        $newRole['permissions'] = $pluckedPermissions->toArray();
        $newRole['name'] = 'new_role_name';
        $this->post('roles/' . $role->id . '/update', $newRole);
        $this->assertDatabaseHas('roles', ['name' => 'new_role_name']);
    }

    /** @test */
    public function unauthorized_user_may_not_delete_role()
    {
        $this->signIn()
            ->withExceptionHandling();
        $role = create($this->roleModel);
        $this->get('roles/' . $role->id . '/delete')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_delete_role()
    {
        $this->signInAsAdmin();
        $role = create($this->roleModel);
        $this->get('roles/' . $role->id . '/delete');

        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    /** @test */
    public function a_role_requires_an_unique_name()
    {
        $this->withExceptionHandling()->signInAsAdmin();
        $role = create($this->roleModel);
        $newRole = make($this->roleModel)->toArray();
        $newRole['name'] = $role->name;
        $this->publishRole($newRole)
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_role_requires_a_name()
    {
        $this->withExceptionHandling()->signInAsAdmin();
        $newRole = make($this->roleModel)->toArray();
        $newRole['name'] = '';
        $this->publishRole($newRole)
            ->assertSessionHasErrors('name');
    }

    /**
     * @param $role
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function publishRole($overrides): \Illuminate\Foundation\Testing\TestResponse
    {
        $permissions = create($this->permissionModel, [], 5);
        $pluckedPermissions = $permissions->pluck('name');
        $overrides['permissions'] = $pluckedPermissions->toArray();
        return $this->post('roles', $overrides);
    }


}
