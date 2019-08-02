<?php
namespace App\Modules\News\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\News\Repository\Interfaces\NewsInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class NewsEloquent extends BaseEloquent implements NewsInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * NewsEloquent constructor.
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
        return $this->model->orderBy('order','asc')->with('getNewsDescription')->get();
    }
}
