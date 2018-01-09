<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PermissionsTest extends TestCase
{
    protected $permissionModel = 'Spatie\Permission\Models\Permission';
    use DatabaseMigrations, DatabaseTransactions;

    /** @test */
    public function acl_seeder_executed()
    {
        $role = Role::where('name', 'admin')->first();
        $this->assertEquals('admin', $role->name);
    }

    /** @test */
    public function authorized_user_can_create_permission()
    {
        $this->signInAsAdmin()
            ->withExceptionHandling();

        $permission = make($this->permissionModel, ['name' => 'new_permission']);
        $this->post('permissions', $permission->toArray());
        $this->assertDatabaseHas('permissions', ['name' => 'new_permission']);
    }

    /** @test */
    public function unauthorized_user_may_not_create_permission()
    {
        $this->signIn();
        $this->withExceptionHandling();

        $this->get('/permissions/create')
            ->assertStatus(403);

        $this->post('/permissions')
            ->assertStatus(403);
    }

    /** @test */
    public function unauthorized_user_may_not_edit_permission()
    {
        $this->signIn()
            ->withExceptionHandling();
        $permission = create($this->permissionModel);
        $this->get('permissions/' . $permission->id . '/edit')
            ->assertStatus(403);

        $this->post('permissions/' . $permission->id . '/update')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_edit_permission()
    {
        $this->signInAsAdmin()
            ->withExceptionHandling();
        $permission = create($this->permissionModel);
        $this->get('permissions/' . $permission->id . '/edit')
            ->assertStatus(200);
        $newPermission = $permission->toArray();
        $newPermission['name'] = 'new_permission_name';
        $this->post('permissions/' . $permission->id . '/update', $newPermission);
        $this->assertDatabaseHas('permissions', ['name' => 'new_permission_name']);
    }

    /** @test */
    public function unauthorized_user_may_not_delete_permission()
    {
        $this->signIn()
            ->withExceptionHandling();
        $permission = create($this->permissionModel);
        $this->get('permissions/' . $permission->id . '/delete')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_delete_permission()
    {
        $this->signInAsAdmin();
        $permission = create($this->permissionModel);
        $this->get('permissions/' . $permission->id . '/delete');

        $this->assertDatabaseMissing('permissions', ['id' => $permission->id]);
    }

    /** @test */
    public function a_permission_requires_a_name()
    {
        $this->withExceptionHandling()->signInAsAdmin();

        $this->publishPermission(['name' => null])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_permission_requires_an_unique_name()
    {
        $this->withExceptionHandling()->signInAsAdmin();
        $permission = create($this->permissionModel);
        $this->publishPermission(['name' => $permission->name])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_permission_requires_a_name_when_updated()
    {
        $this->withExceptionHandling()
            ->signInAsAdmin();
        $permission = create($this->permissionModel);
        $newPermission = $permission->toArray();
        $newPermission['name'] = '';
        $this->post('/permissions/' . $permission->id . '/update', $newPermission)
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_permission_requires_an_unique_name_when_updated_except_its_own_name()
    {
        $this->withExceptionHandling()
            ->signInAsAdmin();
        $firstPerm = create($this->permissionModel);
        $permission = create($this->permissionModel);
        $newPermission = $permission->toArray();
        $newPermission['name'] = $firstPerm->name;
        $this->post('/permissions/' . $permission->id . '/update', $newPermission)
            ->assertSessionHasErrors('name');

        $newName = $permission->name;
        $newPermission['name'] = $newName;
        $this->post('/permissions/' . $permission->id . '/update', $newPermission)
            ->assertRedirect('permissions');
    }

    /**
     * @param $overrides
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    public function publishPermission($overrides): \Illuminate\Foundation\Testing\TestResponse
    {
        $permission = make($this->permissionModel, $overrides);
        return $this->post('/permissions', $permission->toArray());
    }

}