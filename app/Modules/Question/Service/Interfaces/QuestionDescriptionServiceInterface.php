<?php

namespace App\Modules\Question\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface QuestionDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $questionId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $questionId);

    /**
     * @param int $questionId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $questionId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
