<?php

namespace App\Modules\Role\Provider;

use App\Modules\Role\Model\Role;
use App\Modules\Role\Repository\Eloquent\RoleEloquent;
use App\Modules\Role\Repository\Interfaces\RoleInterface;
use App\Modules\Role\Service\Classes\RoleServiceClass;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Role::class;
        $this->app->singleton(RoleInterface::class,function () use ($model){
            return new RoleEloquent(new $model);
        });

        $this->app->singleton(RoleServiceInterface::class,RoleServiceClass::class);

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
