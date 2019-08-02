<?php
namespace App\Modules\Permission\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Permission\Repository\Interfaces\PermissionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class PermissionEloquent extends BaseEloquent implements PermissionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * PermissionEloquent constructor.
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
