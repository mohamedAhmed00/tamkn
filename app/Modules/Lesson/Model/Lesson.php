<?php

namespace App\Modules\Lesson\Model;

use App\Modules\Part\Model\Part;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'order', 'type', 'part_id'];

    public function getLessonDescription()
    {
        return $this->hasMany(LessonDescription::class);
    }

    public function Part(){
        return $this->belongsTo(Part::class);
    }
}
