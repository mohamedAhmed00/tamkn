<?php

namespace App\Modules\Permission\Model;

use App\Modules\Role\Model\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug'];
    /**
     * @param $value
     * @author Nader Ahmed
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
