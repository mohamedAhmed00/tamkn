<?php

namespace App\Modules\Test\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Course\Service\Interfaces\CourseServiceInterface;
use App\Modules\Part\Service\Interfaces\PartServiceInterface;
use App\Modules\Test\Request\TestRequest;
use App\Modules\Test\Service\Classes\TestDescriptionServiceClass;
use App\Modules\Test\Service\Interfaces\TestServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class Test extends Controller
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
     * Test constructor.
     * @param TestServiceInterface $testService
     * @param LanguageServiceInterface $languageService
     * @param TestDescriptionServiceClass $serviceDescription
     * @param PartServiceInterface $partService
     */
    public function __construct(TestServiceInterface $testService,LanguageServiceInterface $languageService,TestDescriptionServiceClass $serviceDescription,PartServiceInterface $partService)
    {
        $this->service = $testService;
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
        $tests =  $this->service->getAllWithDescription($part_id);
        $part = $this->partService->getById($part_id);
        return view('test.index',compact(['tests','part']));
    }

    /**
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create(int $part_id)
    {
        $part = $this->partService->getById($part_id);
        return view('test.form',compact('part'));
    }

    /**
     * @param TestRequest $request
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(TestRequest $request,int $part_id)
    {
        $test = $this->service->storeWithOutImage(array_merge($request->all(),['part_id' => $part_id]));
        $this->serviceDescription->StoreDescription($request->all(),$test->id);
        \request()->session()->put('successful','تم اضافة الجزء بنجاح');
        return redirect()->route('auth.part.test.index',$part_id);
    }

    /**
     * @param int $id
     * @param int $part_id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id,int $part_id)
    {
        $test = $this->service->getById($id);
        $part = $this->partService->getById($part_id);
        return view('test.form',compact(['test','part']));
    }

    /**
     * @param int $id
     * @param int $part_id
     * @param TestRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(TestRequest $request , int $id,int $part_id)
    {
        $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل الجزء بنجاح ');
        return redirect()->route('auth.part.test.index',$part_id);
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
            \request()->session()->put('successful','تم حذف الجزء بنجاح');
//        }
        return redirect()->route('auth.part.test.index',$part_id);
    }
}
