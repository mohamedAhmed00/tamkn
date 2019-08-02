<?php

namespace App\Modules\Role\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Role\Request\RoleRequest;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;

class Role extends Controller
{
    /**
     * @var
     */
    protected $service;


    /**
     * Role constructor.
     * @param RoleServiceInterface $roleService
     */
    public function __construct(RoleServiceInterface $roleService)
    {
        $this->service = $roleService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $roles = $this->service->getAll();
        return view('role.index',compact('roles'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('role.form');
    }

    /**
     * @param RoleRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(RoleRequest $request)
    {
        $request->has('image')? $this->service->storeWithImage($request->all(),'role') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','تم انشاء المجموعة بنجاح');
        return redirect()->route('auth.role.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $role = $this->service->getById($id);
        return view('role.form',compact(['role']));
    }

    /**
     * @param int $id
     * @param RoleRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(RoleRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'role') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل المجموعة بنجاح');
        return redirect()->route('auth.role.index');
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
            \request()->session()->put('successful','تم حذف المجموعة بنجاح');
            return redirect()->route('auth.role.index');
        }
        else
        {
            \request()->session()->put('successful','هذه المجموعة مرتبطه مع مستخدمين لابد من حذف المستخدمين ثم نحذف المجموعة');
            return redirect()->route('auth.role.index');
        }
    }
}
