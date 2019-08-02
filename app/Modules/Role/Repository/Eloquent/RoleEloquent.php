<?php
namespace App\Modules\Role\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Role\Repository\Interfaces\RoleInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class RoleEloquent extends BaseEloquent implements RoleInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * RoleEloquent constructor.
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
     * @return mixed
     */
    public function parts()
    {
        return $this->model->where('slug' ,'!=','client')->get();
    }
}
