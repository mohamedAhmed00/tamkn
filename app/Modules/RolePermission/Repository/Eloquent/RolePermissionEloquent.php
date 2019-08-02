<?php
namespace App\Modules\RolePermission\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Role\Model\Role;
use App\Modules\RolePermission\Repository\Interfaces\RolePermissionInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RolePermissionEloquent extends BaseEloquent implements RolePermissionInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * RolePermissionEloquent constructor.
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
     * @param int $permission
     * @param Role $role
     * @author Nader Ahmed
     * @return mixed
     */
    public function assignPermission(int $permission, Role $role )
    {
        DB::table('roles_permissions')->insert([
           'permission_id' => $permission,
            'role_id' => $role->id
        ]);
    }
}
