<?php

namespace App\Modules\News\Model;

use Illuminate\Database\Eloquent\Model;

class NewsDescription extends Model
{
    protected $table = "new_descriptions";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'content', 'language_id', 'new_id'];
}
