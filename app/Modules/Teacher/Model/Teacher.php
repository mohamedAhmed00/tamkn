<?php

namespace App\Modules\Teacher\Model;

use App\Modules\Product\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'job', 'email', 'phone_number', 'address', 'facebook', 'twitter', 'instagram', 'linkedin',
        'cv_description', 'work_experience', 'study_description', 'image', 'order', 'status'];

}
