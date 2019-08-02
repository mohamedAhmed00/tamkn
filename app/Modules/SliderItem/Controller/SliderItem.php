<?php

namespace App\Modules\SliderItem\Controller;

use App\Generic\Controller\Controller;
use App\Modules\SliderItem\Request\SliderItemRequest;
use App\Modules\SliderItem\Service\Classes\SliderItemDescriptionServiceClass;
use App\Modules\SliderItem\Service\Interfaces\SliderItemServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;
use App\Modules\Lesson\Service\Interfaces\LessonServiceInterface;

class SliderItem extends Controller
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
    protected $lessonService;

    /**
     * SliderItem constructor.
     * @param SliderItemServiceInterface $sliderItemService
     * @param LanguageServiceInterface $languageService
     * @param LessonServiceInterface $lessonService
     * @param SliderItemDescriptionServiceClass $serviceDescription
     */
    public function __construct(SliderItemServiceInterface $sliderItemService,LanguageServiceInterface $languageService,SliderItemDescriptionServiceClass $serviceDescription,LessonServiceInterface $lessonService)
    {
        $this->service = $sliderItemService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
        $this->lessonService = $lessonService;
    }

    /**
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(int $lesson_id)
    {
        $sliderItems = $this->service->getAllWithDescription($lesson_id);
        $lesson = $this->lessonService->getById($lesson_id);
        return view('sliderItem.index',compact(['sliderItems','lesson']));
    }

    /**
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $lesson_id)
    {
        $lesson = $this->lessonService->getById($lesson_id);
        return view('sliderItem.form',compact('lesson'));
    }

    /**
     * @param SliderItemRequest $request
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(SliderItemRequest $request,int $lesson_id)
    {
        $sliderItem = $this->service->storeWithOutImage(array_merge($request->all(),['lesson_id' => $lesson_id]));
        $this->serviceDescription->StoreDescription($request->all(),$sliderItem->id);
        \request()->session()->put('successful','تم اضافة الوثيقة بنجاح');
        return redirect()->route('auth.lesson.sliderItem.index',$lesson_id);
    }

    /**
     * @param int $id
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $lesson_id)
    {
        $sliderItem = $this->service->getById($id);
        $lesson = $this->lessonService->getById($lesson_id);
        return view('sliderItem.form',compact(['sliderItem','lesson']));
    }

    /**
     * @param int $id
     * @param int $lesson_id
     * @param SliderItemRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(SliderItemRequest $request , int $id,int $lesson_id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل الوثيقة بنجاح ');
        return redirect()->route('auth.lesson.sliderItem.index',$lesson_id);
    }

    /**
     * @param int $id
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,int $lesson_id)
    {
        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف الوثيقة بنجاح');
        return redirect()->route('auth.lesson.sliderItem.index',$lesson_id);
    }
}
