<?php

namespace App\Modules\Page\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'image', 'order'];

    public function getPageDescription()
    {
        return $this->hasMany(PageDescription::class);
    }
}
