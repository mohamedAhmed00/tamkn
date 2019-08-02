<?php
namespace App\Modules\Course\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Course\Repository\Interfaces\CourseInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class CourseEloquent extends BaseEloquent implements CourseInterface
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

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription()
    {
        return $this->model->orderBy('order','asc')->with('getCourseDescription')->get();
    }
}
