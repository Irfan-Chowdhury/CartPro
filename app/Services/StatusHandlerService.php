<?php

declare(strict_types=1);

namespace App\Services;


class StatusHandlerService
{
    public function activeData(object $model)
    {
        $data = $model;
        $data->is_active = true;
        $data->update();
    }

    public function inactiveData(object $model) : void
    {
        $data = $model;
        $data->is_active = 0;
        $data->update();
    }

    public function bulkActionData(string $actionType, $model)
    {
        $data = $model;

        if ($actionType == 'active') {

            $data->update(['is_active'=>1]);

            return ['success' => 'Data Active Successfully'];

        } else if ($actionType == 'inactive') {

            $data->update(['is_active'=>0]);

            return ['success' => 'Data Inactive Successfully'];

        } else if ($actionType == 'delete') {

            $data->delete();

            return ['success' => 'Data Deleted Successfully'];
        }
    }
}
