<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use App\Services\Role as RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * @var RoleService
     */
    private $roleService;

    /**
     * RolesController constructor.
     */
    public function __construct(RoleService $roleService)
    {
        $this->middleware('authorization');
        $this->roleService = $roleService;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            $roles = $this->getRoles();
            return $roles;
        }
        return view('admin.roles.index');
    }

    public function datatableList()
    {
        return $this->roleService->datatable();
    }

    public function create()
    {
        $permissions = $this->getPermissions();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRole $request)
    {
        $role = Role::create([
            'name' => request('name'),
            'display_name' => request('display_name')
        ]);

        $permissions = request('permissions');
        $role->givePermissionTo($permissions);

        return backendRedirect('roles');
    }

    public function edit(Role $role)
    {
        $permissions = $this->getPermissions();

        $data['role'] = $role;
        $data['permissions'] = $permissions;
        return view('admin.roles.edit', $data);
    }

    public function update(UpdateRole $request, Role $role)
    {
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $permissions = $request->permissions;
        $role->save();

        $role->syncPermissions($permissions);
        return backendRedirect('roles');
    }

    public function delete(Role $role)
    {
        $role->delete();
        return backendRedirect('roles');
    }

    private function getRoles()
    {
        return Role::all();
    }

    private function getPermissions()
    {
        return Permission::all();
    }
}
