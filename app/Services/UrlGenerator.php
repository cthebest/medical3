<?php

namespace App\Services;

use Modules\MenuItem\Entities\MenuItem;

class UrlGenerator
{
    public function generate($moduleId,  $model)
    {
        $menuItem = $this->getMenuItem($moduleId, $model->id);
        if (!$menuItem) {
            $menuItem = $this->getMenuItem($moduleId);

            $url = $menuItem?->path . '/' . $model->alias;
        } else {
            $url = $menuItem->path;
        }

        return url($url);
    }

    private function getMenuItem($moduleId, $resourceId = null)
    {
        $query = MenuItem::whereJsonContains('association->module_id', "$moduleId");
        if ($resourceId) {
            $query->whereJsonContains('association->resource_id', "$resourceId");
        } else {
            $query->whereNull('association->resource_id');
        }
        //dd($query);
        return $query->first();
    }
}
