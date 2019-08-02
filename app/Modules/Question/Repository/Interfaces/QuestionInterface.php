<?php

namespace App\Modules\Question\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface QuestionInterface extends BaseInterface
{
    /**
     * @param int $test_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $test_id);
}
