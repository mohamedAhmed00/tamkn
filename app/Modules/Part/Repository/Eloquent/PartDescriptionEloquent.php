<?php
namespace App\Modules\Part\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Part\Repository\Interfaces\PartDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class PartDescriptionEloquent extends BaseEloquent implements PartDescriptionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * PartEloquent constructor.
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
