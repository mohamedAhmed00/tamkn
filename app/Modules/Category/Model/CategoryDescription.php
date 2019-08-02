<?php

namespace App\Modules\Category\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'language_id', 'category_id'];
}
