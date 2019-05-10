<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
