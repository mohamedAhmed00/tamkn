<?php

namespace App\Modules\Setting\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Setting\Request\SettingRequest;
use App\Modules\Setting\Request\UpdateSettingRequest;
use App\Modules\Setting\Service\Interfaces\SettingServiceInterface;

class Setting extends Controller
{
    /**
     * @var
     */
    protected $service;


    /**
     * Setting constructor.
     * @param SettingServiceInterface $settingService
     */
    public function __construct(SettingServiceInterface $settingService)
    {
        $this->service = $settingService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $settings = $this->service->getAll();
        return view('setting.index',compact('settings'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('setting.form');
    }

    /**
     * @param SettingRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(SettingRequest $request)
    {
        $this->service->storeSetting($request);
        \request()->session()->put('successful','تم الاضافة بنجاح');
        return redirect()->route('auth.setting.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $setting = $this->service->getById($id);
        return view('setting.form',compact(['setting']));
    }

    /**
     * @param int $id
     * @param UpdateSettingRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateSettingRequest $request , int $id)
    {
        $this->service->updateSetting($request,$id);
        \request()->session()->put('successful','تم التعديل بنجاح');
        return redirect()->route('auth.setting.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id)
    {

        $this->service->delete($id);
        \request()->session()->put('successful','تم الحذف بنجاح');
        return redirect()->route('auth.setting.index');
    }
}
