<?php

namespace App\Modules\Lesson\Model;

use Illuminate\Database\Eloquent\Model;

class LessonDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'sound', 'video', 'content', 'language_id', 'lesson_id'];
}
