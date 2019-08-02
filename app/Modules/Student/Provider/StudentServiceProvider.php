<?php

namespace App\Modules\Student\Provider;

use App\Modules\Student\Repository\Eloquent\StudentEloquent;
use App\Modules\Student\Repository\Interfaces\StudentInterface;
use App\Modules\Student\Service\Classes\StudentServiceClass;
use App\Modules\Student\Service\Interfaces\StudentServiceInterface;
use App\Modules\User\Model\User;
use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = User::class;
        $this->app->singleton(StudentInterface::class,function () use ($model){
            return new StudentEloquent(new $model);
        });

        $this->app->singleton(StudentServiceInterface::class,StudentServiceClass::class);

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
