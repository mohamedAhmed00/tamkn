<?php

namespace App\Modules\User\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use App\Modules\User\Request\UpdateUserProfileRequest;
use App\Modules\User\Request\UserRequest;
use App\Modules\User\Request\UpdateUserRequest;
use App\Modules\User\Service\Interfaces\UserServiceInterface;

class User extends Controller
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
     * User constructor.
     * @param UserServiceInterface $userService
     * @param RoleServiceInterface $roleService
     */
    public function __construct(UserServiceInterface $userService,RoleServiceInterface $roleService)
    {
        $this->service = $userService;
        $this->roleService = $roleService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $roleId = $this->roleService->getWhere(['slug' => 'client'])->first()->id;
        $users = $this->service->specificUser($roleId);
        return view('user.index',compact('users'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        $roles = $this->roleService->parts();
        return view('user.form' , compact('roles'));
    }

    /**
     * @param UserRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(UserRequest $request)
    {
        $this->service->saveUser($request);
        \request()->session()->put('successful','تم انشاء المستخدم بنجاح');
        return redirect()->route('auth.user.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $user = $this->service->getById($id);
        $roles = $this->roleService->parts();
        return view('user.form',compact(['user','roles']));
    }

    /**
     * @param int $id
     * @param UpdateUserRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateUserRequest $request , int $id)
    {
        $this->service->updateUser($request,$id);
        \request()->session()->put('successful','تم تعديل المستخدم بنجاح');
        return redirect()->route('auth.user.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id)
    {
        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف المستخدم بنجاح');
        return redirect()->route('auth.user.index');
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function profile()
    {
        $user = $this->service->getById(auth()->user()->id);
        return view('user.profile',compact(['user']));
    }

    /**
     * @param UpdateUserProfileRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $this->service->updateUser($request,auth()->user()->id);
        \request()->session()->put('successful','تم تعديل حسابك الشخصي بنجاح');
        return redirect()->route('auth.home');
    }
}
