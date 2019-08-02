<?php
namespace App\Modules\Setting\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Setting\Repository\Interfaces\SettingInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class SettingEloquent extends BaseEloquent implements SettingInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * SettingEloquent constructor.
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
