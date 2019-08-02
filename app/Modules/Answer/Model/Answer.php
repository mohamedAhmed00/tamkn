<?php

namespace App\Modules\Answer\Model;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['is_correct', 'order', 'user_id', 'part_id', 'question_id'];

    public function getAnswerDescription()
    {
        return $this->hasMany(AnswerDescription::class);
    }
}
