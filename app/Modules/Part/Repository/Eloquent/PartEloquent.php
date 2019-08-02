<?php
namespace App\Modules\Part\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Part\Repository\Interfaces\PartInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class PartEloquent extends BaseEloquent implements PartInterface
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

    /**
     * @param int $course_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $course_id)
    {
        return $this->model->where(['course_id'=>$course_id])->orderBy('order','asc')->with('getPartDescription')->get();
    }
}
