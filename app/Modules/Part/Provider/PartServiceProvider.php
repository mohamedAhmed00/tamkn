<?php

namespace App\Modules\Part\Provider;

use App\Modules\Part\Model\Part;
use App\Modules\Part\Model\PartDescription;
use App\Modules\Part\Repository\Eloquent\PartDescriptionEloquent;
use App\Modules\Part\Repository\Eloquent\PartEloquent;
use App\Modules\Part\Repository\Interfaces\PartDescriptionInterface;
use App\Modules\Part\Repository\Interfaces\PartInterface;
use App\Modules\Part\Service\Classes\PartDescriptionServiceClass;
use App\Modules\Part\Service\Classes\PartServiceClass;
use App\Modules\Part\Service\Interfaces\PartDescriptionServiceInterface;
use App\Modules\Part\Service\Interfaces\PartServiceInterface;
use Illuminate\Support\ServiceProvider;

class PartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = PartDescription::class;
        $this->app->singleton(PartDescriptionInterface::class,function () use ($model){
            return new PartDescriptionEloquent(new $model);
        });

        $model = Part::class;
        $this->app->singleton(PartInterface::class,function () use ($model){
            return new PartEloquent(new $model);
        });

        $this->app->singleton(PartServiceInterface::class,PartServiceClass::class);

        $this->app->singleton(PartDescriptionServiceInterface::class,PartDescriptionServiceClass::class);
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
