<?php

namespace App\Modules\Course\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Course\Request\CourseRequest;
use App\Modules\Course\Service\Classes\CourseDescriptionServiceClass;
use App\Modules\Course\Service\Interfaces\CourseServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class Course extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * @var
     */
    protected $serviceDescription;

    /**
     * @var
     */
    protected $languageService;

    /**
     * Course constructor.
     * @param CourseServiceInterface $courseService
     * @param LanguageServiceInterface $languageService
     * @param CourseDescriptionServiceClass $serviceDescription
     */
    public function __construct(CourseServiceInterface $courseService,LanguageServiceInterface $languageService,CourseDescriptionServiceClass $serviceDescription)
    {
        $this->service = $courseService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $courses = $this->service->getAllWithDescription();
        return view('course.index',compact(['courses']));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('course.form');
    }

    /**
     * @param CourseRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(CourseRequest $request)
    {
        $course = $request->has('image')? $this->service->storeWithImage($request->all(),'course') : $this->service->storeWithOutImage($request->all());
        $this->serviceDescription->StoreDescription($request->all(),$course->id);
        \request()->session()->put('successful','تم اضافة المثاق بنجاح');
        return redirect()->route('auth.course.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $course = $this->service->getById($id);
        return view('course.form',compact('course'));
    }

    /**
     * @param int $id
     * @param CourseRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(CourseRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'course') : $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل المثاق بنجاح ');
        return redirect()->route('auth.course.index');
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
            \request()->session()->put('successful','هذا المثاق مرتبط مع منتجات . احذف المنتجات اولا ثم احذف المثاق');
        }
        else
        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف المثاق بنجاح');
        }
        return redirect()->route('auth.course.index');
    }
}
