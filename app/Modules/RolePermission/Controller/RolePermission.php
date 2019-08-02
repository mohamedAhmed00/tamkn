<?php

namespace App\Modules\RolePermission\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Permission\Service\Interfaces\PermissionServiceInterface;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use App\Modules\RolePermission\Request\RolePermissionRequest;
use App\Modules\RolePermission\Service\Interfaces\RolePermissionServiceInterface;

class RolePermission extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $roleService;

    /**
     * @var
     */
    protected $permissionService;

    /**
     * RolePermission constructor.
     * @param RolePermissionServiceInterface $rolePermissionService
     * @param PermissionServiceInterface $permissionService
     * @param RoleServiceInterface $roleService
     */
    public function __construct(RolePermissionServiceInterface $rolePermissionService,RoleServiceInterface $roleService,PermissionServiceInterface $permissionService)
    {
        $this->service = $rolePermissionService;
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $roles = $this->roleService->parts();
        return view('rolePermission.index',compact('roles'));
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $permissions = $this->permissionService->getAll();
        $role = $this->roleService->getById($id);
        $rolePermissions = $role->Permissions;
        return view('rolePermission.form',compact(['rolePermissions','permissions','role']));
    }

    /**
     * @param int $id
     * @param RolePermissionRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(RolePermissionRequest $request , int $id)
    {
        $this->service->setPermissions($request->all(),$this->roleService->getById($id));
        \request()->session()->put('successful','تم تعديل الصلاحيات بنجاح');
        return redirect()->route('auth.rolePermission.index');
    }

}
