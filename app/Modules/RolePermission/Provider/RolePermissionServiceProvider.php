<?php

namespace App\Modules\RolePermission\Provider;

use App\Modules\RolePermission\Model\RolePermission;
use App\Modules\RolePermission\Repository\Eloquent\RolePermissionEloquent;
use App\Modules\RolePermission\Repository\Interfaces\RolePermissionInterface;
use App\Modules\RolePermission\Service\Classes\RolePermissionServiceClass;
use App\Modules\RolePermission\Service\Interfaces\RolePermissionServiceInterface;
use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = RolePermission::class;
        $this->app->singleton(RolePermissionInterface::class,function () use ($model){
            return new RolePermissionEloquent(new $model);
        });

        $this->app->singleton(RolePermissionServiceInterface::class,RolePermissionServiceClass::class);

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
