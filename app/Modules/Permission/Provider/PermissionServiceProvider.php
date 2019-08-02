<?php

namespace App\Modules\Permission\Provider;

use App\Modules\Permission\Model\Permission;
use App\Modules\Permission\Repository\Eloquent\PermissionEloquent;
use App\Modules\Permission\Repository\Interfaces\PermissionInterface;
use App\Modules\Permission\Service\Classes\PermissionServiceClass;
use App\Modules\Permission\Service\Interfaces\PermissionServiceInterface;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Permission::class;
        $this->app->singleton(PermissionInterface::class,function () use ($model){
            return new PermissionEloquent(new $model);
        });

        $this->app->singleton(PermissionServiceInterface::class,PermissionServiceClass::class);

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
