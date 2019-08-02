<?php

namespace App\Modules\Category\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'order', 'status'];

    public function getCategoryDescription()
    {
        return $this->hasMany(CategoryDescription::class);
    }
}
