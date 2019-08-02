<?php
namespace App\Modules\Answer\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Answer\Repository\Interfaces\AnswerDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class AnswerDescriptionEloquent extends BaseEloquent implements AnswerDescriptionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * AnswerEloquent constructor.
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
