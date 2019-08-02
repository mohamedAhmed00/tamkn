<?php

namespace App\Modules\Course\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'price', 'status', 'order', 'feature', 'new', 'certificate', 'success_grade', 'icon', 'teacher_id', 'category_id'];

    public function getCourseDescription()
    {
        return $this->hasMany(CourseDescription::class);
    }
}
