<?php
namespace App\Modules\SliderItem\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\SliderItem\Repository\Interfaces\SliderItemDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class SliderItemDescriptionEloquent extends BaseEloquent implements SliderItemDescriptionInterface
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
}
