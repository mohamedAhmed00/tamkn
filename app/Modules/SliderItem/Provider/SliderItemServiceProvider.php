<?php

namespace App\Modules\SliderItem\Provider;

use App\Modules\SliderItem\Model\SliderItem;
use App\Modules\SliderItem\Model\SliderItemDescription;
use App\Modules\SliderItem\Repository\Eloquent\SliderItemDescriptionEloquent;
use App\Modules\SliderItem\Repository\Eloquent\SliderItemEloquent;
use App\Modules\SliderItem\Repository\Interfaces\SliderItemDescriptionInterface;
use App\Modules\SliderItem\Repository\Interfaces\SliderItemInterface;
use App\Modules\SliderItem\Service\Classes\SliderItemDescriptionServiceClass;
use App\Modules\SliderItem\Service\Classes\SliderItemServiceClass;
use App\Modules\SliderItem\Service\Interfaces\SliderItemDescriptionServiceInterface;
use App\Modules\SliderItem\Service\Interfaces\SliderItemServiceInterface;
use Illuminate\Support\ServiceProvider;

class SliderItemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = SliderItemDescription::class;
        $this->app->singleton(SliderItemDescriptionInterface::class,function () use ($model){
            return new SliderItemDescriptionEloquent(new $model);
        });

        $model = SliderItem::class;
        $this->app->singleton(SliderItemInterface::class,function () use ($model){
            return new SliderItemEloquent(new $model);
        });

        $this->app->singleton(SliderItemServiceInterface::class,SliderItemServiceClass::class);

        $this->app->singleton(SliderItemDescriptionServiceInterface::class,SliderItemDescriptionServiceClass::class);
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
