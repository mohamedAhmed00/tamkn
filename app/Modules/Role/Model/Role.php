<?php

namespace App\Modules\Role\Model;

use App\Modules\Permission\Model\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','redirect'];

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

    public function Permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
