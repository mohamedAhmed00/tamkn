<?php

if (!function_exists('get_sliders')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_sliders()
    {
        return app(\App\Modules\Slider\Service\Interfaces\SliderServiceInterface::class)->getWhere(['status'=>1]);
    }
}
