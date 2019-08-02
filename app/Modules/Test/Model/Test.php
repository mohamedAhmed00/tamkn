<?php

namespace App\Modules\Test\Model;

use App\Modules\Part\Model\Part;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'order', 'part_id'];

    public function getTestDescription()
    {
        return $this->hasMany(TestDescription::class);
    }

    public function Part(){
        return $this->belongsTo(Part::class);
    }
}
