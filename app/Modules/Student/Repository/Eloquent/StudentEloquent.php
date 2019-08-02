<?php
namespace App\Modules\Student\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Student\Repository\Interfaces\StudentInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class StudentEloquent extends BaseEloquent implements StudentInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * StudentEloquent constructor.
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
