<?php
namespace App\Modules\Document\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Document\Repository\Interfaces\DocumentInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class DocumentEloquent extends BaseEloquent implements DocumentInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * DocumentEloquent constructor.
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
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $lesson_id)
    {
        return $this->model->where(['lesson_id'=>$lesson_id])->orderBy('order','asc')->with('getDocumentDescription')->get();
    }
}
