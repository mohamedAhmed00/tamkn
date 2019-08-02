<?php

if (!function_exists('get_pages')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_pages()
    {
        return app(\App\Modules\Page\Service\Interfaces\PageServiceInterface::class)->getWhere(['status'=>1]);
    }
}
