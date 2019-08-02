<?php

namespace App\Modules\SliderItem\Model;

use Illuminate\Database\Eloquent\Model;

class SliderItemDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'file', 'language_id', 'sliderItem_id'];
}
