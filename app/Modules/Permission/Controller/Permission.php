<?php

namespace App\Modules\Permission\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Permission\Request\PermissionRequest;
use App\Modules\Permission\Service\Interfaces\PermissionServiceInterface;

class Permission extends Controller
{
    /**
     * @var
     */
    protected $service;


    /**
     * Permission constructor.
     * @param PermissionServiceInterface $permissionService
     */
    public function __construct(PermissionServiceInterface $permissionService)
    {
        $this->service = $permissionService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $permissions = $this->service->getAll();
        return view('permission.index',compact('permissions'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('permission.form');
    }

    /**
     * @param PermissionRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(PermissionRequest $request)
    {
        $request->has('image')? $this->service->storeWithImage($request->all(),'permission') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','تم اضافة الصلاحية بنجاح');
        return redirect()->route('auth.permission.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $permission = $this->service->getById($id);
        return view('permission.form',compact(['permission']));
    }

    /**
     * @param int $id
     * @param PermissionRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(PermissionRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'permission') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل الصلاحية بنجاح');
        return redirect()->route('auth.permission.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id)
    {
        $result = $this->service->canDelete($id);
        if($result)
        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف الصلاحية بنجاح');
            return redirect()->route('auth.permission.index');
        }
        else
        {
            \request()->session()->put('successful','هذه الصلاحية مرتبطه بمجموعات و مستخدمين . احذف المجموعات و المستخدمين ثم احذف الصلاحية ');
            return redirect()->route('auth.permission.index');
        }
    }
}
