<?php

namespace App\Modules\Question\Provider;

use App\Modules\Question\Model\Question;
use App\Modules\Question\Model\QuestionDescription;
use App\Modules\Question\Repository\Eloquent\QuestionDescriptionEloquent;
use App\Modules\Question\Repository\Eloquent\QuestionEloquent;
use App\Modules\Question\Repository\Interfaces\QuestionDescriptionInterface;
use App\Modules\Question\Repository\Interfaces\QuestionInterface;
use App\Modules\Question\Service\Classes\QuestionDescriptionServiceClass;
use App\Modules\Question\Service\Classes\QuestionServiceClass;
use App\Modules\Question\Service\Interfaces\QuestionDescriptionServiceInterface;
use App\Modules\Question\Service\Interfaces\QuestionServiceInterface;
use Illuminate\Support\ServiceProvider;

class QuestionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = QuestionDescription::class;
        $this->app->singleton(QuestionDescriptionInterface::class,function () use ($model){
            return new QuestionDescriptionEloquent(new $model);
        });

        $model = Question::class;
        $this->app->singleton(QuestionInterface::class,function () use ($model){
            return new QuestionEloquent(new $model);
        });

        $this->app->singleton(QuestionServiceInterface::class,QuestionServiceClass::class);

        $this->app->singleton(QuestionDescriptionServiceInterface::class,QuestionDescriptionServiceClass::class);
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
