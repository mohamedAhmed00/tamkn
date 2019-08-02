<?php

namespace App\Modules\Document\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Document\Request\DocumentRequest;
use App\Modules\Document\Service\Classes\DocumentDescriptionServiceClass;
use App\Modules\Document\Service\Interfaces\DocumentServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;
use App\Modules\Lesson\Service\Interfaces\LessonServiceInterface;

class Document extends Controller
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
     * Document constructor.
     * @param DocumentServiceInterface $documentService
     * @param LanguageServiceInterface $languageService
     * @param LessonServiceInterface $lessonService
     * @param DocumentDescriptionServiceClass $serviceDescription
     */
    public function __construct(DocumentServiceInterface $documentService,LanguageServiceInterface $languageService,DocumentDescriptionServiceClass $serviceDescription,LessonServiceInterface $lessonService)
    {
        $this->service = $documentService;
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
        $documents = $this->service->getAllWithDescription($lesson_id);
        $lesson = $this->lessonService->getById($lesson_id);
        return view('document.index',compact(['documents','lesson']));
    }

    /**
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $lesson_id)
    {
        $lesson = $this->lessonService->getById($lesson_id);
        return view('document.form',compact('lesson'));
    }

    /**
     * @param DocumentRequest $request
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(DocumentRequest $request,int $lesson_id)
    {
        $document = $this->service->storeWithOutImage(array_merge($request->all(),['lesson_id' => $lesson_id]));
        $this->serviceDescription->StoreDescription($request->all(),$document->id);
        \request()->session()->put('successful','تم اضافة الوثيقة بنجاح');
        return redirect()->route('auth.lesson.document.index',$lesson_id);
    }

    /**
     * @param int $id
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $lesson_id)
    {
        $document = $this->service->getById($id);
        $lesson = $this->lessonService->getById($lesson_id);
        return view('document.form',compact(['document','lesson']));
    }

    /**
     * @param int $id
     * @param int $lesson_id
     * @param DocumentRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(DocumentRequest $request , int $id,int $lesson_id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل الوثيقة بنجاح ');
        return redirect()->route('auth.lesson.document.index',$lesson_id);
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
        return redirect()->route('auth.lesson.document.index',$lesson_id);
    }
}
