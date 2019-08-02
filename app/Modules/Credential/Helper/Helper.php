<?php



if (!function_exists('get_role')) {
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    function get_role()
    {
        return auth()->user()->Roles;
    }
}
