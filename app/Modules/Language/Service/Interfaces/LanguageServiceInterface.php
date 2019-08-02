<?php

namespace App\Modules\Language\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface LanguageServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
