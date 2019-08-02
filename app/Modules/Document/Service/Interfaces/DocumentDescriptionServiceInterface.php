<?php

namespace App\Modules\Document\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface DocumentDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $documentId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $documentId);

    /**
     * @param int $documentId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $documentId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
