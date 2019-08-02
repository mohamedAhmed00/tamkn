<?php

namespace App\Modules\Part\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Course\Service\Interfaces\CourseServiceInterface;
use App\Modules\Part\Request\PartRequest;
use App\Modules\Part\Service\Classes\PartDescriptionServiceClass;
use App\Modules\Part\Service\Interfaces\PartServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class Part extends Controller
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
     * @var
     */
    protected $courseService;
    /**
     * Part constructor.
     * @param PartServiceInterface $partService
     * @param LanguageServiceInterface $languageService
     * @param PartDescriptionServiceClass $serviceDescription
     */
    public function __construct(PartServiceInterface $partService,LanguageServiceInterface $languageService,PartDescriptionServiceClass $serviceDescription,CourseServiceInterface $courseService)
    {
        $this->service = $partService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
        $this->courseService = $courseService;
    }

    /**
     * @param int $course_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(int $course_id)
    {
        $parts = $this->service->getAllWithDescription($course_id);
        $course = $this->courseService->getById($course_id);
        return view('part.index',compact(['parts','course']));
    }

    /**
     * @param int $course_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $course_id)
    {
        $course = $this->courseService->getById($course_id);
        return view('part.form',compact('course'));
    }

    /**
     * @param PartRequest $request
     * @param int $course_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(PartRequest $request,int $course_id)
    {
        $part = $this->service->storeWithOutImage(array_merge($request->all(),['course_id' => $course_id]));
        $this->serviceDescription->StoreDescription($request->all(),$part->id);
        \request()->session()->put('successful','تم اضافة الجزء بنجاح');
        return redirect()->route('auth.course.part.index',$course_id);
    }

    /**
     * @param int $id
     * @param int $course_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $course_id)
    {
        $part = $this->service->getById($id);
        $course = $this->courseService->getById($course_id);
        return view('part.form',compact(['part','course']));
    }

    /**
     * @param int $id
     * @param int $course_id
     * @param PartRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(PartRequest $request , int $id,int $course_id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل الجزء بنجاح ');
        return redirect()->route('auth.course.part.index',$course_id);
    }

    /**
     * @param int $id
     * @param int $course_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,int $course_id)
    {
        $result = $this->service->canDelete($id);
        if($result)
        {
            \request()->session()->put('successful','هذا القسم مرتبط مع منتجات . احذف المنتجات اولا ثم احذف القسم');
        }
        else
        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف الجزء بنجاح');
        }
        return redirect()->route('auth.course.part.index',$course_id);
    }
}
