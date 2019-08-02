<?php

namespace App\Modules\Setting\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Setting\Repository\Interfaces\SettingInterface;
use App\Modules\Setting\Service\Interfaces\SettingServiceInterface;

class SettingServiceClass extends BaseServiceClass implements SettingServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * SettingServiceClass constructor.
     * @param SettingInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(SettingInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Settings());
        return true;
    }

    /**
     * @param   $request
     * @author Nader Ahmed
     * @return void
     */
    public function storeSetting($request)
    {
        if($request->hasFile('value'))
        {
            $data = $request->all();
            $image = $request->file('value');
            $path = $this->imageUpload($image,'setting');
            $data['value'] = $path;
            $this->storeWithOutImage($data);
        }
        else
        {
            $this->storeWithOutImage($request->all());
        }
    }

    /**
     * @param   $request
     * @param   int $id
     * @author Nader Ahmed
     * @return void
     */
    public function updateSetting($request , int $id)
    {
        if($request->hasFile('value'))
        {
            $this->removeImageFromDisk($this->getById($id)->value);
            $data = $request->only(['type']);
            $image = $request->file('value');
            $path = $this->imageUpload($image,'setting');
            $data['value'] = $path;
            $this->updateWithoutImage($id,$data);

        }
        else
        {
            $this->updateWithoutImage($id,$request->all());
        }
    }
}

