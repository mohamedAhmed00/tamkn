<?php

namespace App\Modules\Slider\Model;

use Illuminate\Database\Eloquent\Model;

class SliderDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'language_id', 'slider_id' ];
}
