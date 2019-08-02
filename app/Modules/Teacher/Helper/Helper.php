<?php

if (!function_exists('get_teachers')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_teachers()
    {
        return app(\App\Modules\Teacher\Service\Interfaces\TeacherServiceInterface::class)->getWhere(['status'=>1]);
    }
}
