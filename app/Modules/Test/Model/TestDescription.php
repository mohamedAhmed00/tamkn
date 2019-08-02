<?php

namespace App\Modules\Test\Model;

use Illuminate\Database\Eloquent\Model;

class TestDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'language_id', 'test_id'];
}
