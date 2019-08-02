<?php

namespace App\Modules\Language\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Language\Request\LanguageRequest;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class Language extends Controller
{
    /**
     * @var
     */
    protected $service;

    /**
     * Language constructor.
     * @param LanguageServiceInterface $languageService
     */
    public function __construct(LanguageServiceInterface $languageService)
    {
        $this->service = $languageService;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $languages = $this->service->getAll();
        return view('language.index',compact('languages'));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('language.form');
    }

    /**
     * @param LanguageRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(LanguageRequest $request)
    {
        $request->has('image')? $this->service->storeWithImage($request->all(),'language') : $this->service->storeWithOutImage($request->all());
        \request()->session()->put('successful','تم اضافة القسم بنجاح');
        return redirect()->route('auth.language.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $language = $this->service->getById($id);
        return view('language.form',compact('language'));
    }

    /**
     * @param int $id
     * @param LanguageRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(LanguageRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'language') : $this->service->updateWithoutImage($id,$request->all());
        \request()->session()->put('successful','تم تعديل القسم بنجاح ');
        return redirect()->route('auth.language.index');
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
//            $this->service->delete($id);
//            \request()->session()->put('successful','تم حذف القسم بنجاح');
//        }

        $this->service->delete($id);
        \request()->session()->put('successful','تم حذف القسم بنجاح');
        return redirect()->route('auth.language.index');
    }
}
