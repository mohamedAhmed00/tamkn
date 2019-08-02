<?php

namespace App\Modules\News\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'featured', 'image','order'];

    public function getNewsDescription()
    {
        return $this->hasMany(NewsDescription::class,'new_id');
    }
}
