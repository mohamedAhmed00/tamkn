<?php

namespace App\Modules\Question\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface QuestionServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $test_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $test_id);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
