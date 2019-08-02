<?php

namespace App\Modules\Page\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Page\Request\PageRequest;
use App\Modules\Page\Service\Classes\PageDescriptionServiceClass;
use App\Modules\Page\Service\Interfaces\PageServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class Page extends Controller
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
     * Page constructor.
     * @param PageServiceInterface $pageService
     * @param LanguageServiceInterface $languageService
     * @param PageDescriptionServiceClass $serviceDescription
     */
    public function __construct(PageServiceInterface $pageService,LanguageServiceInterface $languageService,PageDescriptionServiceClass $serviceDescription)
    {
        $this->service = $pageService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $pages = $this->service->getAllWithDescription();
        return view('page.index',compact(['pages']));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('page.form');
    }

    /**
     * @param PageRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(PageRequest $request)
    {
        $page = $request->has('image')? $this->service->storeWithImage($request->all(),'page') : $this->service->storeWithOutImage($request->all());
        $this->serviceDescription->StoreDescription($request->all(),$page->id);
        \request()->session()->put('successful','تم اضافة القسم بنجاح');
        return redirect()->route('auth.page.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $pages = $this->service->getById($id);
        return view('page.form',compact('pages'));
    }

    /**
     * @param int $id
     * @param PageRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(PageRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'page') : $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل القسم بنجاح ');
        return redirect()->route('auth.page.index');
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
            $this->service->delete($id);
            \request()->session()->put('successful','تم حذف القسم بنجاح');
//        }
        return redirect()->route('auth.page.index');
    }
}
