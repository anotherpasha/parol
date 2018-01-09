<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermission;
use App\Http\Requests\UpdatePermission;
use App\Services\Permission as PermissionService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * @var PermissionService
     */
    private $permissionService;

    /**
     * PermissionsController constructor.
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->middleware('authorization')->except(['datatableList']);
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        if (request()->wantsJson()) {
            $permissions = $this->getPermissions();
            return $permissions;
        }
        return view('admin.permissions.index');
    }

    public function datatableList()
    {
        return $this->permissionService->datatable();
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(StorePermission $request)
    {
        Permission::create([
            'name' => request('name'),
            'display_name' => request('display_name')
        ]);

        return backendRedirect('permissions');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermission $request, Permission $permission)
    {
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->save();

        return backendRedirect('permissions');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return backendRedirect('permissions');
    }

    private function getPermissions()
    {
        return Permission::all();
    }
}
