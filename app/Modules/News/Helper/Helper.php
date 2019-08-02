<?php

if (!function_exists('get_news')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_news()
    {
        return app(\App\Modules\News\Service\Interfaces\NewsServiceInterface::class)->getWhere(['status'=>1]);
    }
}
