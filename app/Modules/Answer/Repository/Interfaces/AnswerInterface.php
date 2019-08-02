<?php

namespace App\Modules\Answer\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface AnswerInterface extends BaseInterface
{
    /**
     * @param int $question_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $question_id);
}
