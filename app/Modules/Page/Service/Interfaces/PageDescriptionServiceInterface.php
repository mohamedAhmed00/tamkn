<?php

namespace App\Modules\Page\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface PageDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $pageId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $pageId);

    /**
     * @param int $pageId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $pageId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
