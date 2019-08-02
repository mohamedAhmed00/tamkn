<?php

namespace App\Modules\Test\Provider;

use App\Modules\Test\Model\Test;
use App\Modules\Test\Model\TestDescription;
use App\Modules\Test\Repository\Eloquent\TestDescriptionEloquent;
use App\Modules\Test\Repository\Eloquent\TestEloquent;
use App\Modules\Test\Repository\Interfaces\TestDescriptionInterface;
use App\Modules\Test\Repository\Interfaces\TestInterface;
use App\Modules\Test\Service\Classes\TestDescriptionServiceClass;
use App\Modules\Test\Service\Classes\TestServiceClass;
use App\Modules\Test\Service\Interfaces\TestDescriptionServiceInterface;
use App\Modules\Test\Service\Interfaces\TestServiceInterface;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = TestDescription::class;
        $this->app->singleton(TestDescriptionInterface::class,function () use ($model){
            return new TestDescriptionEloquent(new $model);
        });

        $model = Test::class;
        $this->app->singleton(TestInterface::class,function () use ($model){
            return new TestEloquent(new $model);
        });

        $this->app->singleton(TestServiceInterface::class,TestServiceClass::class);

        $this->app->singleton(TestDescriptionServiceInterface::class,TestDescriptionServiceClass::class);
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
