<?php

namespace App\Modules\Student\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface StudentServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @param  $request
     * @author Nader Ahmed
     * @return void
     */
    public function saveStudent( $request);

    /**
     * @param  $request
     * @param  int $id
     * @author Nader Ahmed
     * @return void
     */
    public function updateStudent( $request,int $id);
}
