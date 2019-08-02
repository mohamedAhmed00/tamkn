<?php

namespace App\Modules\Part\Model;

use App\Modules\Course\Model\Course;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'order', 'course_id'];

    public function getPartDescription()
    {
        return $this->hasMany(PartDescription::class);
    }

    public function Course(){
        return $this->belongsTo(Course::class);
    }
}
