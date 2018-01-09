<?php

namespace App\Services;

use Spatie\Permission\Models\Permission as PermissionModel;

class Permission
{
    use DatatableParameters;

    protected $baseUrl = 'permissions';

    public function datatable()
    {
        $data = $this->getList();
        $actions = $this->actionParameters([
            'permissions.edit' => 'edit',
            'permissions.delete' => 'delete'
        ]);

        return (new DatatableGenerator($data))
            ->addActions($actions)
            ->generate();
    }

    public function getList()
    {
        return PermissionModel::all();
    }
}
