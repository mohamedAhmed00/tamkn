<?php

namespace App\Modules\News\Provider;

use App\Modules\News\Model\News;
use App\Modules\News\Model\NewsDescription;
use App\Modules\News\Repository\Eloquent\NewsDescriptionEloquent;
use App\Modules\News\Repository\Eloquent\NewsEloquent;
use App\Modules\News\Repository\Interfaces\NewsDescriptionInterface;
use App\Modules\News\Repository\Interfaces\NewsInterface;
use App\Modules\News\Service\Classes\NewsDescriptionServiceClass;
use App\Modules\News\Service\Classes\NewsServiceClass;
use App\Modules\News\Service\Interfaces\NewsDescriptionServiceInterface;
use App\Modules\News\Service\Interfaces\NewsServiceInterface;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = NewsDescription::class;
        $this->app->singleton(NewsDescriptionInterface::class,function () use ($model){
            return new NewsDescriptionEloquent(new $model);
        });

        $model = News::class;
        $this->app->singleton(NewsInterface::class,function () use ($model){
            return new NewsEloquent(new $model);
        });

        $this->app->singleton(NewsServiceInterface::class,NewsServiceClass::class);

        $this->app->singleton(NewsDescriptionServiceInterface::class,NewsDescriptionServiceClass::class);
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
