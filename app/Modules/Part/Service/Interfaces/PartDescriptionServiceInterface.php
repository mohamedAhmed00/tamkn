<?php

namespace App\Modules\Part\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface PartDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $partId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $partId);

    /**
     * @param int $partId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $partId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
