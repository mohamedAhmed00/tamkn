<?php

namespace App\Modules\Document\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Document\Repository\Interfaces\DocumentDescriptionInterface;
use App\Modules\Document\Service\Interfaces\DocumentDescriptionServiceInterface;

class DocumentDescriptionServiceClass extends BaseServiceClass implements DocumentDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * DocumentServiceClass constructor.
     * @param DocumentDescriptionInterface $documentDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(DocumentDescriptionInterface $documentDescription)
    {
        $this->repository = $documentDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $documentId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $documentId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $file = $this->fileUpload($arr['file_'.$language->key],'document');
            $lang = ['title' => $arr['title_'.$language->key] , 'file' => $file , 'document_id' => $documentId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $documentId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $documentId)
    {
        $descriptions = $this->repository->getWhere(['document_id' => $documentId]);
        foreach($descriptions as $description)
        {
            $this->removeImageFromDisk($description->file);
            $description->delete();
        }
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
       $bool = ($this->repository->getById($id)->Products->count() != 0)? true : false  ;
       return $bool;
    }
}

