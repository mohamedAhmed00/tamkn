<?php

namespace App\Modules\Slider\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key' , 'status'];

    public function getSliderDescription()
    {
        return $this->hasMany(SliderDescription::class);
    }
}
