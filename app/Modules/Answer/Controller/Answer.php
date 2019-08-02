<?php

namespace App\Modules\Answer\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Answer\Request\AnswerRequest;
use App\Modules\Answer\Service\Classes\AnswerDescriptionServiceClass;
use App\Modules\Answer\Service\Interfaces\AnswerServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;
use App\Modules\Question\Service\Interfaces\QuestionServiceInterface;

class Answer extends Controller
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
    protected $questionService;
    /**
     * Answer constructor.
     * @param AnswerServiceInterface $answerService
     * @param LanguageServiceInterface $languageService
     * @param AnswerDescriptionServiceClass $serviceDescription
     * @param QuestionServiceInterface $questionService
     */
    public function __construct(AnswerServiceInterface $answerService,LanguageServiceInterface $languageService,AnswerDescriptionServiceClass $serviceDescription,QuestionServiceInterface $questionService)
    {
        $this->service = $answerService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
        $this->questionService = $questionService;
    }

    /**
     * @param int $question_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index(int $question_id)
    {
        $answers =  $this->service->getAllWithDescription($question_id);
        $question = $this->questionService->getById($question_id);
        return view('answer.index',compact(['answers','question']));
    }

    /**
     * @param int $question_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $question_id)
    {
        $question = $this->questionService->getById($question_id);
        return view('answer.form',compact('question'));
    }

    /**
     * @param AnswerRequest $request
     * @param int $question_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(AnswerRequest $request,int $question_id)
    {
        $answer = $this->service->storeWithOutImage(array_merge($request->all(),['question_id' => $question_id,'part_id' => $this->questionService->getById($question_id)->Test->part_id]));
        $this->serviceDescription->StoreDescription($request->all(),$answer->id);
        \request()->session()->put('successful','تم اضافة الاجابة بنجاح');
        return redirect()->route('auth.question.answer.index',$question_id);
    }

    /**
     * @param int $id
     * @param int $question_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $question_id)
    {
        $answer = $this->service->getById($id);
        $question = $this->questionService->getById($question_id);
        return view('answer.form',compact(['answer','question']));
    }

    /**
     * @param int $id
     * @param int $question_id
     * @param AnswerRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(AnswerRequest $request , int $id,int $question_id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل الاجابة بنجاح ');
        return redirect()->route('auth.question.answer.index',$question_id);
    }

    /**
     * @param int $id
     * @param int $question_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function delete(int $id,int $question_id)
    {
//        $result = $this->service->canDelete($id);
//        if($result)
//        {
//            \request()->session()->put('successful','هذا القسم مرتبط مع منتجات . احذف المنتجات اولا ثم احذف القسم');
//        }
//        else
//        {
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف الاجابة بنجاح');
//        }
        return redirect()->route('auth.question.answer.index',$question_id);
    }
}
