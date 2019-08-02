<?php

namespace App\Modules\News\Controller;

use App\Generic\Controller\Controller;
use App\Modules\News\Request\NewsRequest;
use App\Modules\News\Service\Classes\NewsDescriptionServiceClass;
use App\Modules\News\Service\Interfaces\NewsServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class News extends Controller
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
     * News constructor.
     * @param NewsServiceInterface $newsService
     * @param LanguageServiceInterface $languageService
     * @param NewsDescriptionServiceClass $serviceDescription
     */
    public function __construct(NewsServiceInterface $newsService,LanguageServiceInterface $languageService,NewsDescriptionServiceClass $serviceDescription)
    {
        $this->service = $newsService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $news = $this->service->getAllWithDescription();
        return view('news.index',compact(['news']));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('news.form');
    }

    /**
     * @param NewsRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(NewsRequest $request)
    {
        $news = $request->has('image')? $this->service->storeWithImage($request->all(),'news') : $this->service->storeWithOutImage($request->all());
        $this->serviceDescription->StoreDescription($request->all(),$news->id);
        \request()->session()->put('successful','تم اضافة الخبر بنجاح');
        return redirect()->route('auth.news.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $news = $this->service->getById($id);
        return view('news.form',compact('news'));
    }

    /**
     * @param int $id
     * @param NewsRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(NewsRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'news') : $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل الخبر بنجاح ');
        return redirect()->route('auth.news.index');
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
            \request()->session()->put('successful','تم حذف الخبر بنجاح');
//        }
        return redirect()->route('auth.news.index');
    }
}
