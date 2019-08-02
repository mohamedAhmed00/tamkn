<?php

namespace App\Modules\Slider\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface SliderDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $sliderId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $sliderId);

    /**
     * @param int $sliderId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $sliderId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
