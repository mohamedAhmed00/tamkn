<?php
namespace App\Modules\Lesson\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Lesson\Repository\Interfaces\LessonDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class LessonDescriptionEloquent extends BaseEloquent implements LessonDescriptionInterface
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
}
