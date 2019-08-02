<?php

namespace App\Modules\Setting\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface SettingServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @param   $request
     * @author Nader Ahmed
     * @return void
     */
    public function storeSetting($request);

    /**
     * @param   $request
     * @param   int $id
     * @author Nader Ahmed
     * @return void
     */
    public function updateSetting($request , int $id);
}
