<?php

namespace App\Modules\News\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface NewsDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $newsId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $newsId);

    /**
     * @param int $newsId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $newsId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
