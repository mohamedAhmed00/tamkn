<?php

namespace App\Modules\Slider\Provider;

use App\Modules\Slider\Model\Slider;
use App\Modules\Slider\Model\SliderDescription;
use App\Modules\Slider\Repository\Eloquent\SliderDescriptionEloquent;
use App\Modules\Slider\Repository\Eloquent\SliderEloquent;
use App\Modules\Slider\Repository\Interfaces\SliderDescriptionInterface;
use App\Modules\Slider\Repository\Interfaces\SliderInterface;
use App\Modules\Slider\Service\Classes\SliderDescriptionServiceClass;
use App\Modules\Slider\Service\Classes\SliderServiceClass;
use App\Modules\Slider\Service\Interfaces\SliderDescriptionServiceInterface;
use App\Modules\Slider\Service\Interfaces\SliderServiceInterface;
use Illuminate\Support\ServiceProvider;

class SliderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = SliderDescription::class;
        $this->app->singleton(SliderDescriptionInterface::class,function () use ($model){
            return new SliderDescriptionEloquent(new $model);
        });

        $model = Slider::class;
        $this->app->singleton(SliderInterface::class,function () use ($model){
            return new SliderEloquent(new $model);
        });

        $this->app->singleton(SliderServiceInterface::class,SliderServiceClass::class);

        $this->app->singleton(SliderDescriptionServiceInterface::class,SliderDescriptionServiceClass::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
