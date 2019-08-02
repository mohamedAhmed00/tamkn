<?php

namespace App\Modules\User\Provider;

use App\Modules\User\Model\User;
use App\Modules\User\Repository\Eloquent\UserEloquent;
use App\Modules\User\Repository\Interfaces\UserInterface;
use App\Modules\User\Service\Classes\UserServiceClass;
use App\Modules\User\Service\Interfaces\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = User::class;
        $this->app->singleton(UserInterface::class,function () use ($model){
            return new UserEloquent(new $model);
        });

        $this->app->singleton(UserServiceInterface::class,UserServiceClass::class);

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
