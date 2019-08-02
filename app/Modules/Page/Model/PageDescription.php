<?php

namespace App\Modules\Page\Model;

use Illuminate\Database\Eloquent\Model;

class PageDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'description', 'language_id', 'page_id'];
}
