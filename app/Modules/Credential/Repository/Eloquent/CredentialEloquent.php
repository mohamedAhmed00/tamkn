<?php
namespace App\Modules\Credential\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Credential\Repository\Interfaces\CredentialInterface;
use Auth;
use App\Modules\Credential\Model\User;
use Illuminate\Database\Eloquent\Model;

class CredentialEloquent extends BaseEloquent implements CredentialInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }
}
