<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class ACLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'setting' => 'Setting',
            'admin' => 'Dashboard',
            'permissions' => 'Permission',
            'permissions.add' => 'Add Permission',
            'permissions.edit' => 'Edit Permission',
            'permissions.delete' => 'Delete Permission',
            'roles' => 'Role',
            'roles.add' => 'Add Role',
            'roles.edit' => 'Edit Role',
            'roles.delete' => 'Delete Role',
            'users' => 'User',
            'users.add' => 'Add User',
            'users.edit' => 'Edit User',
            'users.delete' => 'Delete User',
            'categories' => 'Category',
            'categories.add' => 'Add Category',
            'categories.edit' => 'Edit Category',
            'categories.delete' => 'Delete Category',
            'menus' => 'Menu',
            'menus.add' => 'Add Menu',
            'menus.edit' => 'Edit Menu',
            'menus.delete' => 'Delete Menu',
            'posts' => 'Posts',
            'posts.add' => 'Add Posts',
            'posts.edit' => 'Edit Posts',
            'posts.delete' => 'Delete Posts',
        ];

        $users = [
            [
                'email' => 'pasha.md5@gmail.com',
                'name' => 'Pasha Mahardika',
                'password' => 'secret',
                'role' => 'admin'
            ],
            [
                'email' => 'n.nurjamal@gmail.com',
                'name' => 'Nanang Nurjamal',
                'password' => 'nanangtea',
                'role' => 'admin'
            ],
            [
                'email' => 'user@kleur.id',
                'name' => 'user',
                'password' => 'secret',
                'role' => 'user'
            ]
        ];

        // generate admin users, role and permissions
        $role = \Spatie\Permission\Models\Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);

        $storedPerms = [];
        foreach ($permissions as $name => $showName) {
            $perm = \Spatie\Permission\Models\Permission::create([
                'name' => $name,
                'display_name' => $showName
            ]);
            $storedPerms[] = $perm;
        }
        $role->givePermissionTo($storedPerms);

        $userRole = \Spatie\Permission\Models\Role::create([
            'name' => 'user',
            'display_name' => 'User'
        ]);


        foreach ($users as $user) {
            $u = \App\Models\User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password'])
            ]);

            if ($user['role'] == 'admin') {
                $u->assignRole($role);
            } else {
                $u->assignRole($userRole);
            }
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
        app(PermissionRegistrar::class)->registerPermissions();

    }
}
