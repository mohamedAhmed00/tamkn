<?php

namespace App\Modules\Category\Provider;

use App\Modules\Category\Model\Category;
use App\Modules\Category\Model\CategoryDescription;
use App\Modules\Category\Repository\Eloquent\CategoryDescriptionEloquent;
use App\Modules\Category\Repository\Eloquent\CategoryEloquent;
use App\Modules\Category\Repository\Interfaces\CategoryDescriptionInterface;
use App\Modules\Category\Repository\Interfaces\CategoryInterface;
use App\Modules\Category\Service\Classes\CategoryDescriptionServiceClass;
use App\Modules\Category\Service\Classes\CategoryServiceClass;
use App\Modules\Category\Service\Interfaces\CategoryDescriptionServiceInterface;
use App\Modules\Category\Service\Interfaces\CategoryServiceInterface;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = CategoryDescription::class;
        $this->app->singleton(CategoryDescriptionInterface::class,function () use ($model){
            return new CategoryDescriptionEloquent(new $model);
        });

        $model = Category::class;
        $this->app->singleton(CategoryInterface::class,function () use ($model){
            return new CategoryEloquent(new $model);
        });

        $this->app->singleton(CategoryServiceInterface::class,CategoryServiceClass::class);

        $this->app->singleton(CategoryDescriptionServiceInterface::class,CategoryDescriptionServiceClass::class);
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
