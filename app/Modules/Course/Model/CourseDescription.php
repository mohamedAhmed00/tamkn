<?php

namespace App\Modules\Course\Model;

use Illuminate\Database\Eloquent\Model;

class CourseDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'content', 'name', 'language_id', 'course_id'];
}
