<?php


namespace App\Services;


use Spatie\Permission\Models\Role as RoleModel;

class Role
{
    use DatatableParameters;

    protected $baseUrl = 'roles';

    public function datatable()
    {
        $data = $this->getList();
        $actions = $this->actionParameters([
            'roles.edit' => 'edit',
            'roles.delete' => 'delete'
        ]);

        return (new DatatableGenerator($data))
            ->addActions($actions)
            ->generate();
    }

    public function getList()
    {
        return RoleModel::all();
    }
}