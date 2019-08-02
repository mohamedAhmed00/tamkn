<?php

namespace App\Modules\Course\Provider;

use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\CourseDescription;
use App\Modules\Course\Repository\Eloquent\CourseDescriptionEloquent;
use App\Modules\Course\Repository\Eloquent\CourseEloquent;
use App\Modules\Course\Repository\Interfaces\CourseDescriptionInterface;
use App\Modules\Course\Repository\Interfaces\CourseInterface;
use App\Modules\Course\Service\Classes\CourseDescriptionServiceClass;
use App\Modules\Course\Service\Classes\CourseServiceClass;
use App\Modules\Course\Service\Interfaces\CourseDescriptionServiceInterface;
use App\Modules\Course\Service\Interfaces\CourseServiceInterface;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = CourseDescription::class;
        $this->app->singleton(CourseDescriptionInterface::class,function () use ($model){
            return new CourseDescriptionEloquent(new $model);
        });

        $model = Course::class;
        $this->app->singleton(CourseInterface::class,function () use ($model){
            return new CourseEloquent(new $model);
        });

        $this->app->singleton(CourseServiceInterface::class,CourseServiceClass::class);

        $this->app->singleton(CourseDescriptionServiceInterface::class,CourseDescriptionServiceClass::class);
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
