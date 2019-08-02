<?php

namespace App\Modules\Answer\Provider;

use App\Modules\Answer\Model\Answer;
use App\Modules\Answer\Model\AnswerDescription;
use App\Modules\Answer\Repository\Eloquent\AnswerDescriptionEloquent;
use App\Modules\Answer\Repository\Eloquent\AnswerEloquent;
use App\Modules\Answer\Repository\Interfaces\AnswerDescriptionInterface;
use App\Modules\Answer\Repository\Interfaces\AnswerInterface;
use App\Modules\Answer\Service\Classes\AnswerDescriptionServiceClass;
use App\Modules\Answer\Service\Classes\AnswerServiceClass;
use App\Modules\Answer\Service\Interfaces\AnswerDescriptionServiceInterface;
use App\Modules\Answer\Service\Interfaces\AnswerServiceInterface;
use Illuminate\Support\ServiceProvider;

class AnswerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = AnswerDescription::class;
        $this->app->singleton(AnswerDescriptionInterface::class,function () use ($model){
            return new AnswerDescriptionEloquent(new $model);
        });

        $model = Answer::class;
        $this->app->singleton(AnswerInterface::class,function () use ($model){
            return new AnswerEloquent(new $model);
        });

        $this->app->singleton(AnswerServiceInterface::class,AnswerServiceClass::class);

        $this->app->singleton(AnswerDescriptionServiceInterface::class,AnswerDescriptionServiceClass::class);
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
