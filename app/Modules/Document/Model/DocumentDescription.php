<?php

namespace App\Modules\Document\Model;

use Illuminate\Database\Eloquent\Model;

class DocumentDescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'file', 'language_id', 'document_id'];
}
