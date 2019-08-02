<?php

namespace App\Modules\SliderItem\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface SliderItemDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $sliderItemId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $sliderItemId);

    /**
     * @param int $sliderItemId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $sliderItemId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
