<?php
namespace App\Modules\News\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\News\Repository\Interfaces\NewsDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class NewsDescriptionEloquent extends BaseEloquent implements NewsDescriptionInterface
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
}
