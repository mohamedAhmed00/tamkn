<?php

namespace App\Modules\Lesson\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Lesson\Request\LessonRequest;
use App\Modules\Lesson\Service\Classes\LessonDescriptionServiceClass;
use App\Modules\Lesson\Service\Interfaces\LessonServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;
use App\Modules\Part\Service\Interfaces\PartServiceInterface;

class Lesson extends Controller
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
    protected $partService;

    /**
     * Lesson constructor.
     * @param LessonServiceInterface $lessonService
     * @param LanguageServiceInterface $languageService
     * @param PartServiceInterface $partService
     * @param LessonDescriptionServiceClass $serviceDescription
     */
    public function __construct(LessonServiceInterface $lessonService,LanguageServiceInterface $languageService,LessonDescriptionServiceClass $serviceDescription,PartServiceInterface $partService)
    {
        $this->service = $lessonService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
        $this->partService = $partService;
    }

    /**
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(int $part_id)
    {
        $lessons = $this->service->getAllWithDescription($part_id);
        $part = $this->partService->getById($part_id);
        return view('lesson.index',compact(['lessons','part']));
    }

    /**
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $part_id)
    {
        $part = $this->partService->getById($part_id);
        return view('lesson.form',compact('part'));
    }

    /**
     * @param LessonRequest $request
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(LessonRequest $request,int $part_id)
    {
        $lesson = $this->service->storeWithOutImage(array_merge($request->all(),['part_id' => $part_id,'type' => 'lesson']));
        $this->serviceDescription->StoreDescription($request->all(),$lesson->id);
        \request()->session()->put('successful','تم اضافة الدرس بنجاح');
        return redirect()->route('auth.part.lesson.index',$part_id);
    }

    /**
     * @param int $id
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $part_id)
    {
        $lesson = $this->service->getById($id);
        $part = $this->partService->getById($part_id);
        return view('lesson.form',compact(['lesson','part']));
    }

    /**
     * @param int $id
     * @param int $part_id
     * @param LessonRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(LessonRequest $request , int $id,int $part_id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل الدرس بنجاح ');
        return redirect()->route('auth.part.lesson.index',$part_id);
    }

    /**
     * @param int $id
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,int $part_id)
    {
//        $result = $this->service->canDelete($id);
//        if($result)
//        {
//            \request()->session()->put('successful','هذا القسم مرتبط مع منتجات . احذف المنتجات اولا ثم احذف القسم');
//        }
//        else
//        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف الدرس بنجاح');
//        }
        return redirect()->route('auth.part.lesson.index',$part_id);
    }
}
