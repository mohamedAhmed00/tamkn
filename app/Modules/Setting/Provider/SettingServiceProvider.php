<?php

namespace App\Modules\Setting\Provider;

use App\Modules\Setting\Model\Setting;
use App\Modules\Setting\Repository\Eloquent\SettingEloquent;
use App\Modules\Setting\Repository\Interfaces\SettingInterface;
use App\Modules\Setting\Service\Classes\SettingServiceClass;
use App\Modules\Setting\Service\Interfaces\SettingServiceInterface;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = Setting::class;
        $this->app->singleton(SettingInterface::class,function () use ($model){
            return new SettingEloquent(new $model);
        });

        $this->app->singleton(SettingServiceInterface::class,SettingServiceClass::class);

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
