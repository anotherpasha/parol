<?php

namespace App\Services;


trait DatatableParameters
{
    function actionParameters(array $actions)
    {
        $params = array();
        foreach ($actions as $permission => $action) {
            $function = $action.'Parameter';
            $params[$action] = $this->$function($permission);
        }

        return $params;
    }

    protected function editParameter($permission = '')
    {
        $url = $this->baseUrl . '/%s/edit';
        $edit = [
            'title' => 'Edit',
            'link' => backendUrl($url),
            'class' => 'uk-label uk-text-capitalize green',
            'icon' => 'fa fa-fw fa-pencil'
        ];
        if ($permission != '') {
            if (auth()->user()->can($permission)) {
                return $edit;
            }
        } else {
            return $edit;
        }
    }

    protected function detailParameter($permission = '')
    {
        $url = $this->baseUrl . '/%s/detail';
        $detail = [
            'title'     => 'Detail',
            'link'      => backendUrl($url),
            'class'     => 'uk-label uk-text-capitalize blue',
            'icon'      => 'fa fa-fw fa-eye'
        ];
        if ($permission != '') {
            if (auth()->user()->can($permission)) {
                return $detail;
            }
        } else {
            return $detail;
        }
    }

    protected function deleteParameter($permission = '')
    {
        $url = $this->baseUrl . '/%s/delete';
        $delete = [
            'title'     => 'Delete',
            'link'      => backendUrl($url),
            'class'     => 'uk-label uk-text-capitalize red',
            'icon'      => 'fa fa-fw fa-times-circle',
        ];
        if ($permission != '') {
            if (auth()->user()->can($permission)) {
                return $delete;
            }
        } else {
            return $delete;
        }
    }
}
