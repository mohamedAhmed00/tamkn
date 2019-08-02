<?php

namespace App\Modules\Setting\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value','type'];

    /**
     * @param $value
     * @author Nader Ahmed
     * @return void
     */
    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = Str::slug($value);
    }
}
