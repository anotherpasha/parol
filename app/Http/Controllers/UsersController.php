<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Services\User as UserService;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    //
    /**
     * @var User
     */
    private $userService;

    /**
     * UsersController constructor.
     */
    public function __construct(UserService $userService)
    {
        // $this->middleware('authorization')->except(['datatableList']);
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function datatableList()
    {
        return $this->userService->datatable();
    }

    public function create()
    {
        $roles = $this->getRoles();
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUser $request)
    {
        if ($this->userService->store($request)) {
            return backendRedirect('users');
        }
        return backendRedirect('users/create')->withErrors(['error' => 'Unknown error.']);
    }

    public function edit(User $user)
    {
        $roles = $this->getRoles();
        return view('admin.users.edit', compact(['roles', 'user']));
    }

    public function update(UpdateUser $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $roles = $request->roles;
        $user->syncRoles($roles);

        return backendRedirect('users');
    }

    public function delete(User $user)
    {
        $user->delete();
        return backendRedirect('users');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getRoles()
    {
        return Role::all();
    }
}
