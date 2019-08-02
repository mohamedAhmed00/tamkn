<?php

namespace App\Modules\Test\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface TestDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $testId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $testId);

    /**
     * @param int $testId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $testId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
