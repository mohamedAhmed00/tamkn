<?php
namespace App\Modules\Page\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Page\Repository\Interfaces\PageInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class PageEloquent extends BaseEloquent implements PageInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * PageEloquent constructor.
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
        return $this->model->orderBy('order','asc')->with('getPageDescription')->get();
    }
}
