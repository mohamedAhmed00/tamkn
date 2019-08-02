<?php

namespace App\Modules\Page\Provider;

use App\Modules\Page\Model\Page;
use App\Modules\Page\Model\PageDescription;
use App\Modules\Page\Repository\Eloquent\PageDescriptionEloquent;
use App\Modules\Page\Repository\Eloquent\PageEloquent;
use App\Modules\Page\Repository\Interfaces\PageDescriptionInterface;
use App\Modules\Page\Repository\Interfaces\PageInterface;
use App\Modules\Page\Service\Classes\PageDescriptionServiceClass;
use App\Modules\Page\Service\Classes\PageServiceClass;
use App\Modules\Page\Service\Interfaces\PageDescriptionServiceInterface;
use App\Modules\Page\Service\Interfaces\PageServiceInterface;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = PageDescription::class;
        $this->app->singleton(PageDescriptionInterface::class,function () use ($model){
            return new PageDescriptionEloquent(new $model);
        });

        $model = Page::class;
        $this->app->singleton(PageInterface::class,function () use ($model){
            return new PageEloquent(new $model);
        });

        $this->app->singleton(PageServiceInterface::class,PageServiceClass::class);

        $this->app->singleton(PageDescriptionServiceInterface::class,PageDescriptionServiceClass::class);
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
