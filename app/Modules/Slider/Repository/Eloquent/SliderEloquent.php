<?php
namespace App\Modules\Slider\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Slider\Repository\Interfaces\SliderInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class SliderEloquent extends BaseEloquent implements SliderInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * SliderEloquent constructor.
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
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription()
    {
        return $this->model->with('getSliderDescription')->get();
    }
}
