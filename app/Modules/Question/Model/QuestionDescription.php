<?php

namespace App\Modules\Question\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['question', 'language_id', 'question_id'];
}
