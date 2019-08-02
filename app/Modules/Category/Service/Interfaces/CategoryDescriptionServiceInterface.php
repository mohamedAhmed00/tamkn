<?php

namespace App\Modules\Category\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface CategoryDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $categoryId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $categoryId);

    /**
     * @param int $categoryId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $categoryId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
