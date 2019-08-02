<?php

namespace App\Modules\Answer\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface AnswerDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $answerId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $answerId);

    /**
     * @param int $answerId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $answerId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
