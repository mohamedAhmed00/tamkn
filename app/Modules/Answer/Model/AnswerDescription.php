<?php

namespace App\Modules\Answer\Model;

use Illuminate\Database\Eloquent\Model;

class AnswerDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['answer', 'language_id', 'answer_id'];
}
