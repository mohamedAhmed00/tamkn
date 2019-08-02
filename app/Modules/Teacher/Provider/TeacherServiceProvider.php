<?php

namespace App\Modules\Teacher\Provider;

use App\Modules\Teacher\Model\Teacher;
use App\Modules\Teacher\Repository\Eloquent\TeacherEloquent;
use App\Modules\Teacher\Repository\Interfaces\TeacherInterface;
use App\Modules\Teacher\Service\Classes\TeacherServiceClass;
use App\Modules\Teacher\Service\Interfaces\TeacherServiceInterface;
use Illuminate\Support\ServiceProvider;

class TeacherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Teacher::class;
        $this->app->singleton(TeacherInterface::class,function () use ($model){
            return new TeacherEloquent(new $model);
        });

        $this->app->singleton(TeacherServiceInterface::class,TeacherServiceClass::class);

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
