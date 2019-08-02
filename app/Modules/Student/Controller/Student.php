<?php

namespace App\Modules\Student\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use App\Modules\Student\Request\StudentRequest;
use App\Modules\Student\Request\UpdateStudentRequest;
use App\Modules\Student\Service\Interfaces\StudentServiceInterface;

class Student extends Controller
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
     * Student constructor.
     * @param StudentServiceInterface $studentService
     * @param RoleServiceInterface $roleService
     */
    public function __construct(StudentServiceInterface $studentService,RoleServiceInterface $roleService)
    {
        $this->service = $studentService;
        $this->roleService = $roleService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $role = $this->roleService->getWhere(['slug' => 'student'])->first();
        $students = $this->service->getWhere(['role_id' => $role->id]);
        return view('student.index',compact('students'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('student.form' );
    }

    /**
     * @param StudentRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(StudentRequest $request)
    {
        $role = $this->roleService->getWhere(['slug' => 'student'])->first();
        $request->request->add(['role_id' => $role->id]);
        $this->service->saveStudent($request);
        \request()->session()->put('successful','تم اضافة العميل بنجاح');
        return redirect()->route('auth.student.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $student = $this->service->getById($id);
        return view('student.form',compact(['student','roles']));
    }

    /**
     * @param int $id
     * @param UpdateStudentRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(UpdateStudentRequest $request , int $id)
    {
        $this->service->updateStudent($request,$id);
        \request()->session()->put('successful','تم تعديل العميل بنجاح');
        return redirect()->route('auth.student.index');
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
            \request()->session()->put('successful','تم حذف العميل بنجاح');
            return redirect()->route('auth.student.index');
        }
        else
        {
            \request()->session()->put('successful','هذا العميل مرتبط بنتائج و عمليات و طلبات اخرا . قم بحذفهم قبل حذف العميل');
            return redirect()->route('auth.student.index');
        }
    }
}
