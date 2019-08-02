<?php

namespace App\Modules\Teacher\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Teacher\Request\TeacherRequest;
use App\Modules\Teacher\Service\Interfaces\TeacherServiceInterface;

class Teacher extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * Teacher constructor.
     * @param TeacherServiceInterface $teacherService
     */
    public function __construct(TeacherServiceInterface $teacherService)
    {
        $this->service = $teacherService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $teachers = $this->service->getAll();
        return view('teacher.index',compact('teachers'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('teacher.form');
    }

    /**
     * @param TeacherRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(TeacherRequest $request)
    {
        $request->has('image')? $this->service->storeWithImage($request->all(),'teacher') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','تم اضافة المعلم بنجاح');
        return redirect()->route('auth.teacher.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $teacher = $this->service->getById($id);
        return view('teacher.form',compact('teacher'));
    }

    /**
     * @param int $id
     * @param TeacherRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(TeacherRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'teacher') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل المعلم بنجاح ');
        return redirect()->route('auth.teacher.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id)
    {
//        $result = $this->service->canDelete($id);
//        if($result)
//        {
//            \request()->session()->put('successful','هذا القسم مرتبط مع منتجات . احذف المنتجات اولا ثم احذف القسم');
//        }
//        else
//        {
//            $this->service->delete($id);
//            \request()->session()->put('successful','تم حذف القسم بنجاح');
//        }

        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف المعلم بنجاح');
        return redirect()->route('auth.teacher.index');
    }
}
