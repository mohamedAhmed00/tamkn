<?php

namespace App\Modules\Credential\Provider;

use App\Modules\Credential\Model\User;
use App\Modules\Credential\Repository\Eloquent\CredentialEloquent;
use App\Modules\Credential\Repository\Interfaces\CredentialInterface;
use App\Modules\Credential\Service\Classes\CredentialServiceClass;
use App\Modules\Credential\Service\Interfaces\CredentialServiceInterface;
use Illuminate\Support\ServiceProvider;

class CredentialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = User::class;
        $this->app->singleton(CredentialInterface::class,function () use ($model){
            return new CredentialEloquent(new $model);
        });

        $this->app->singleton(CredentialServiceInterface::class,CredentialServiceClass::class);

        require_once app_path('Modules/Credential/Helper/Helper.php') ;

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
