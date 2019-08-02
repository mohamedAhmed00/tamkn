<?php

namespace App\Modules\Slider\Controller;

use App\Generic\Controller\Controller;
use App\Modules\Slider\Request\SliderRequest;
use App\Modules\Slider\Service\Classes\SliderDescriptionServiceClass;
use App\Modules\Slider\Service\Interfaces\SliderServiceInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;
use Illuminate\Support\Str;

class Slider extends Controller
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
     * Slider constructor.
     * @param SliderServiceInterface $sliderService
     * @param LanguageServiceInterface $languageService
     * @param SliderDescriptionServiceClass $serviceDescription
     */
    public function __construct(SliderServiceInterface $sliderService,LanguageServiceInterface $languageService,SliderDescriptionServiceClass $serviceDescription)
    {
        $this->service = $sliderService;
        $this->languageService = $languageService;
        $this->serviceDescription = $serviceDescription;
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function index()
    {
        $sliders = $this->service->getAllWithDescription();
        return view('slider.index',compact(['sliders']));
    }

    /**
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function create()
    {
        return view('slider.form');
    }

    /**
     * @param SliderRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function store(SliderRequest $request)
    {
        $slider = $this->service->storeWithoutImage(array_merge($request->all(),['key' => Str::slug($request->get('name_en'))]));
        $this->serviceDescription->StoreDescription($request->all(),$slider->id);
        \request()->session()->put('successful','تم اضافة العداد بنجاح');
        return redirect()->route('auth.slider.index');
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function edit(int $id)
    {
        $sliders = $this->service->getById($id);
        return view('slider.form',compact('sliders'));
    }

    /**
     * @param int $id
     * @param SliderRequest $request
     * @author Nader Ahmed
     * @return View|Mixed
     */
    public function update(SliderRequest $request , int $id)
    {
        $request->has('image')? $this->service->updateWithImage($id,$request->all(),'slider') : $this->service->updateWithoutImage($id,$request->all());
        $this->serviceDescription->DeleteDescriptions( $id);
        $this->serviceDescription->StoreDescription($request->all(),$id);
        \request()->session()->put('successful','تم تعديل العداد بنجاح ');
        return redirect()->route('auth.slider.index');
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
            \request()->session()->put('successful','تم حذف العداد بنجاح');
//        }
        return redirect()->route('auth.slider.index');
    }
}
