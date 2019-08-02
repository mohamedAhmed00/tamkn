<?php

namespace App\Modules\Answer\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface AnswerServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $question_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $question_id);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
