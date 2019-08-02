<?php
namespace App\Modules\SliderItem\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\SliderItem\Repository\Interfaces\SliderItemInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class SliderItemEloquent extends BaseEloquent implements SliderItemInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * SliderItemEloquent constructor.
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
        return $this->model->where(['lesson_id'=>$lesson_id])->orderBy('order','asc')->with('getSliderItemDescription')->get();
    }
}
