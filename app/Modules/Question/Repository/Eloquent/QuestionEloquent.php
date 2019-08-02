<?php
namespace App\Modules\Question\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Question\Repository\Interfaces\QuestionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class QuestionEloquent extends BaseEloquent implements QuestionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * QuestionEloquent constructor.
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
     * @param int $test_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $test_id)
    {
        return $this->model->where(['test_id'=>$test_id])->orderBy('order','asc')->with('getQuestionDescription')->get();
    }
}
