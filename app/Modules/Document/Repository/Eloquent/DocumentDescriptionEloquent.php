<?php
namespace App\Modules\Document\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Document\Repository\Interfaces\DocumentDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class DocumentDescriptionEloquent extends BaseEloquent implements DocumentDescriptionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * DocumentEloquent constructor.
     * @param Model $model
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }
}
