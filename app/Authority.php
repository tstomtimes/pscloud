<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    protected $guarded = [];

    public function member()
    {
    	return $this->hasOne(Member::class);
    }
}
