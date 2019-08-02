<?php
namespace App\Modules\User\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\User\Repository\Interfaces\UserInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class UserEloquent extends BaseEloquent implements UserInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * UserEloquent constructor.
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
     * @param int $roleId
     * @author Nader Ahmed
     * @return mixed
     */
    public function specificUser($roleId)
    {
        return $this->model->where('role_id','!=' , $roleId)->get();
    }
}
