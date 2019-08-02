<?php
namespace App\Modules\Language\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Language\Repository\Interfaces\LanguageInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class LanguageEloquent extends BaseEloquent implements LanguageInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * LanguageEloquent constructor.
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
