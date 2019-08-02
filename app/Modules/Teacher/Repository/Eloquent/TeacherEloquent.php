<?php
namespace App\Modules\Teacher\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Teacher\Repository\Interfaces\TeacherInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class TeacherEloquent extends BaseEloquent implements TeacherInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * TeacherEloquent constructor.
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
