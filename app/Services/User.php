<?php


namespace App\Services;


use App\Models\User as UserModel;

class User
{
    use DatatableParameters;

    protected $baseUrl = 'users';

    public function datatable()
    {
        $data = $this->getList();
        $actions = $this->actionParameters([
            'users.edit' => 'edit',
            'users.delete' => 'delete'
        ]);

        return (new DatatableGenerator($data))
            ->addActions($actions)
            ->generate();
    }

    public function getList()
    {
        return UserModel::all();
    }

    public function store($request)
    {
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $roles = request('roles');
        $user->assignRole($roles);
        return $user;
    }
}