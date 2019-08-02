<?php
namespace App\Modules\Category\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Category\Repository\Interfaces\CategoryDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class CategoryDescriptionEloquent extends BaseEloquent implements CategoryDescriptionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * CategoryEloquent constructor.
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
