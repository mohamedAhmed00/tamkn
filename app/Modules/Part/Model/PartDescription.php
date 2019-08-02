<?php

namespace App\Modules\Part\Model;

use Illuminate\Database\Eloquent\Model;

class PartDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'language_id', 'part_id'];
}
