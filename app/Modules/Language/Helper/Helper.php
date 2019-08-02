<?php



if (!function_exists('get_languages')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_languages()
    {
        return app(\App\Modules\Language\Service\Interfaces\LanguageServiceInterface::class)->getAll();
    }
}

if (!function_exists('get_default_language')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_default_language()
    {
        return app(\App\Modules\Language\Service\Interfaces\LanguageServiceInterface::class)->getWhere(['default' => 1])->first();
    }
}
