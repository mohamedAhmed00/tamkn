<?php
namespace App\Modules\Answer\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Answer\Repository\Interfaces\AnswerInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class AnswerEloquent extends BaseEloquent implements AnswerInterface
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

    /**
     * @param int $question_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $question_id)
    {
        return $this->model->where(['question_id'=>$question_id])->orderBy('order','asc')->with('getAnswerDescription')->get();
    }
}
