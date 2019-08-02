<?php
namespace App\Modules\Category\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Category\Repository\Interfaces\CategoryInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class CategoryEloquent extends BaseEloquent implements CategoryInterface
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

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription()
    {
        return $this->model->orderBy('order','asc')->with('getCategoryDescription')->get();
    }
}
