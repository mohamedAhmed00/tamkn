<?php
namespace App\Modules\Question\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Question\Repository\Interfaces\QuestionDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class QuestionDescriptionEloquent extends BaseEloquent implements QuestionDescriptionInterface
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
}
