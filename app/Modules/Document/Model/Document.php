<?php

namespace App\Modules\Document\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'order', 'lesson_id'];

    public function getDocumentDescription()
    {
        return $this->hasMany(DocumentDescription::class);
    }
}
