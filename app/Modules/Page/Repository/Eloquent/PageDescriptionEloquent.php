<?php
namespace App\Modules\Page\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Page\Repository\Interfaces\PageDescriptionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class PageDescriptionEloquent extends BaseEloquent implements PageDescriptionInterface
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
}
