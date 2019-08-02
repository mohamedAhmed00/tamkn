<?php

namespace App\Modules\Question\Model;

use App\Modules\Test\Model\Test;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'order', 'test_id','degree'];

    public function getQuestionDescription()
    {
        return $this->hasMany(QuestionDescription::class);
    }

    public function Test(){
        return $this->belongsTo(Test::class);
    }
}
