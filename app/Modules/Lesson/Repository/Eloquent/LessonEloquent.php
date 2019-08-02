<?php
namespace App\Modules\Lesson\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Lesson\Repository\Interfaces\LessonInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class LessonEloquent extends BaseEloquent implements LessonInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * LessonEloquent constructor.
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
     * @param int $part_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $part_id)
    {
        return $this->model->where(['part_id'=>$part_id])->orderBy('order','asc')->with('getLessonDescription')->get();
    }
}
