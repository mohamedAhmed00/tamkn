<?php

namespace App\Modules\SliderItem\Model;

use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'order', 'lesson_id'];

    public function getSliderItemDescription()
    {
        return $this->hasMany(SliderItemDescription::class);
    }
}
