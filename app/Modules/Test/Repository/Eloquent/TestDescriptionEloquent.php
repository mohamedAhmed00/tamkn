<?php
namespace App\Modules\Test\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Test\Repository\Interfaces\TestDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class TestDescriptionEloquent extends BaseEloquent implements TestDescriptionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * TestEloquent constructor.
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
