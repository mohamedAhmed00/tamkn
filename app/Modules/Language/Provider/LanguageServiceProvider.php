<?php

namespace App\Modules\Language\Provider;

use App\Modules\Language\Model\Language;
use App\Modules\Language\Repository\Eloquent\LanguageEloquent;
use App\Modules\Language\Repository\Interfaces\LanguageInterface;
use App\Modules\Language\Service\Classes\LanguageServiceClass;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;
use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Language::class;
        $this->app->singleton(LanguageInterface::class,function () use ($model){
            return new LanguageEloquent(new $model);
        });

        $this->app->singleton(LanguageServiceInterface::class,LanguageServiceClass::class);

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
