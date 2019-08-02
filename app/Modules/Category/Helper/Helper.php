<?php

if (!function_exists('get_categories')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_categories()
    {
        return app(\App\Modules\Category\Service\Interfaces\CategoryServiceInterface::class)->getWhere(['status'=>1]);
    }
}
