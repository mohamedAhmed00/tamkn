<?php

namespace App\Modules\Lesson\Provider;

use App\Modules\Lesson\Model\Lesson;
use App\Modules\Lesson\Model\LessonDescription;
use App\Modules\Lesson\Repository\Eloquent\LessonDescriptionEloquent;
use App\Modules\Lesson\Repository\Eloquent\LessonEloquent;
use App\Modules\Lesson\Repository\Interfaces\LessonDescriptionInterface;
use App\Modules\Lesson\Repository\Interfaces\LessonInterface;
use App\Modules\Lesson\Service\Classes\LessonDescriptionServiceClass;
use App\Modules\Lesson\Service\Classes\LessonServiceClass;
use App\Modules\Lesson\Service\Interfaces\LessonDescriptionServiceInterface;
use App\Modules\Lesson\Service\Interfaces\LessonServiceInterface;
use Illuminate\Support\ServiceProvider;

class LessonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = LessonDescription::class;
        $this->app->singleton(LessonDescriptionInterface::class,function () use ($model){
            return new LessonDescriptionEloquent(new $model);
        });

        $model = Lesson::class;
        $this->app->singleton(LessonInterface::class,function () use ($model){
            return new LessonEloquent(new $model);
        });

        $this->app->singleton(LessonServiceInterface::class,LessonServiceClass::class);

        $this->app->singleton(LessonDescriptionServiceInterface::class,LessonDescriptionServiceClass::class);
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
