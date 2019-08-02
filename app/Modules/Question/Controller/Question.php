<?php

namespace App\Modules\Question\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Course\Service\Interfaces\CourseServiceInterface;
use App\Modules\Test\Service\Interfaces\TestServiceInterface;
use App\Modules\Question\Request\QuestionRequest;
use App\Modules\Question\Service\Classes\QuestionDescriptionServiceClass;
use App\Modules\Question\Service\Interfaces\QuestionServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class Question extends Controller
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
    protected $testService;
    /**
     * Question constructor.
     * @param QuestionServiceInterface $questionService
     * @param LanguageServiceInterface $languageService
     * @param QuestionDescriptionServiceClass $serviceDescription
     * @param TestServiceInterface $testService
     */
    public function __construct(QuestionServiceInterface $questionService,LanguageServiceInterface $languageService,QuestionDescriptionServiceClass $serviceDescription,TestServiceInterface $testService)
    {
        $this->service = $questionService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
        $this->testService = $testService;
    }

    /**
     * @param int $test_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(int $test_id)
    {
        $questions =  $this->service->getAllWithDescription($test_id);
        $test = $this->testService->getById($test_id);
        return view('question.index',compact(['questions','test']));
    }

    /**
     * @param int $test_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $test_id)
    {
        $test = $this->testService->getById($test_id);
        return view('question.form',compact('test'));
    }

    /**
     * @param QuestionRequest $request
     * @param int $test_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(QuestionRequest $request,int $test_id)
    {
        $question = $this->service->storeWithOutImage(array_merge($request->all(),['test_id' => $test_id]));
        $this->serviceDescription->StoreDescription($request->all(),$question->id);
        \request()->session()->put('successful','تم اضافة السؤال بنجاح');
        return redirect()->route('auth.test.question.index',$test_id);
    }

    /**
     * @param int $id
     * @param int $test_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $test_id)
    {
        $question = $this->service->getById($id);
        $test = $this->testService->getById($test_id);
        return view('question.form',compact(['question','test']));
    }

    /**
     * @param int $id
     * @param int $test_id
     * @param QuestionRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(QuestionRequest $request , int $id,int $test_id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل السؤال بنجاح ');
        return redirect()->route('auth.test.question.index',$test_id);
    }

    /**
     * @param int $id
     * @param int $test_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,int $test_id)
    {
//        $result = $this->service->canDelete($id);
//        if($result)
//        {
//            \request()->session()->put('successful','هذا القسم مرتبط مع منتجات . احذف المنتجات اولا ثم احذف القسم');
//        }
//        else
//        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف السؤال بنجاح');
//        }
        return redirect()->route('auth.test.question.index',$test_id);
    }
}
