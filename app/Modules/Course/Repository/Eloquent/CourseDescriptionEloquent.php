<?php
namespace App\Modules\Course\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Course\Repository\Interfaces\CourseDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class CourseDescriptionEloquent extends BaseEloquent implements CourseDescriptionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * CourseEloquent constructor.
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
