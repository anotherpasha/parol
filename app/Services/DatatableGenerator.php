<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class DatatableGenerator
{
    private $collection;
    private $datatable;

    /**
     * DatatableGenerator constructor.
     * @param $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
        $this->datatable = Datatables::of($collection);
    }

    public function addColumn($name, $closure)
    {
        $this->datatable->addColumn($name, $closure);
        return $this;
    }

    public function addActions(array $actions)
    {
        $this->datatable->addColumn('action', function ($collection) use ($actions) {
            $action = '<div class="uk-text-center">';
            $hasLink = false;
            foreach ($actions as $act) {
                $link = $this->generateActionLink($act, $collection);
                if ($link != '') {
                    $class = ( $act['class'] ? $act['class'] : '' );
                    $icon = ( $act['icon'] ? '<i class="' . $act['icon'] . '"></i>' : '' );
                    $action .= '<a href="' .$link. '" class="' . $class . '" title="' . $act['title'] . '" uk-tooltip>' . $icon . ' ' . $act['title'] . '</a> ';
                    $hasLink = true;
                }
            }
            if (! $hasLink) {
                $action .= '-------';
            }
            $action .= '</div>';
            return $action;
        });

        return $this;
    }

    public function generate()
    {
        return $this->datatable->make(true);
    }

    private function generateActionLink($act, $collection)
    {
        $show = true;
        if ( isset($act['whereClause']) ) {
            $whereClause = $act['whereClause'];
            $show = $whereClause($collection);
        }
        $link = $act['link'];
        return ( $show ? ( $link ? sprintf($link, $collection->id) : '' ) : '' );
    }
}
