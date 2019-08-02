<?php

namespace App\Modules\Document\Provider;

use App\Modules\Document\Model\Document;
use App\Modules\Document\Model\DocumentDescription;
use App\Modules\Document\Repository\Eloquent\DocumentDescriptionEloquent;
use App\Modules\Document\Repository\Eloquent\DocumentEloquent;
use App\Modules\Document\Repository\Interfaces\DocumentDescriptionInterface;
use App\Modules\Document\Repository\Interfaces\DocumentInterface;
use App\Modules\Document\Service\Classes\DocumentDescriptionServiceClass;
use App\Modules\Document\Service\Classes\DocumentServiceClass;
use App\Modules\Document\Service\Interfaces\DocumentDescriptionServiceInterface;
use App\Modules\Document\Service\Interfaces\DocumentServiceInterface;
use Illuminate\Support\ServiceProvider;

class DocumentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $model = DocumentDescription::class;
        $this->app->singleton(DocumentDescriptionInterface::class,function () use ($model){
            return new DocumentDescriptionEloquent(new $model);
        });

        $model = Document::class;
        $this->app->singleton(DocumentInterface::class,function () use ($model){
            return new DocumentEloquent(new $model);
        });

        $this->app->singleton(DocumentServiceInterface::class,DocumentServiceClass::class);

        $this->app->singleton(DocumentDescriptionServiceInterface::class,DocumentDescriptionServiceClass::class);
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
