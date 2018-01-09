<?php

namespace Tests\Feature;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    protected $roleModel = 'Spatie\Permission\Models\Role';

    /** @test */
    public function unautorized_user_may_not_create_user()
    {
        $this->signIn();
        $this->withExceptionHandling();

        $this->get('/users/create')
            ->assertStatus(403);

        $this->post('/users')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_create_user()
    {
        $this->signInAsAdmin();

        $this->get('users/create')
            ->assertStatus(200);

        $user = make('App\Models\User', ['name' => 'newuser'])->toArray();
        $role = Role::first();
        $pluckedRole = $role->name;
        $user['roles'] = [$pluckedRole];
        $user['password'] = 'newpass';
        $user['password_confirmation'] = 'newpass';
        $this->post('users/', $user);

        $this->assertDatabaseHas('users', ['name' => 'newuser']);
    }

    /** @test */
    public function a_user_requires_roles()
    {
        $this->withExceptionHandling()->signInAsAdmin();
        $user = make('App\Models\User');
        $this->post('users', $user->toArray())
            ->assertSessionHasErrors('roles');
    }

    /** @test */
    public function saved_user_has_expected_role()
    {
        $role = create($this->roleModel);
        $user = create('App\Models\User');
        $user->assignRole($role);

        $this->assertEquals($user->roles->first()->id, $role->id);
    }

    /** @test */
    public function unauthorized_user_may_not_edit_user()
    {
        $this->signIn()
            ->withExceptionHandling();

        $user = create('App\Models\User');

        $this->get('users/' . $user->id . '/edit')
            ->assertStatus(403);

        $this->post('users/' . $user->id . '/update')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_edit_user()
    {
        $this->signInAsAdmin()->withExceptionHandling();

        $role = create($this->roleModel);
        $pluckedRole = $role->pluck('name');
        $user = create('App\Models\User');
        $user->assignRole($role->name);
        $this->get('users/' . $user->id . '/edit')
            ->assertStatus(200);

        $newUser = $user->toArray();
        $newUser['roles'] = $pluckedRole->toArray();
        $newUser['name'] = 'new_user_name';
        $this->post('users/' . $user->id . '/update', $newUser);
        $this->assertDatabaseHas('users', ['name' => 'new_user_name']);
    }
}
