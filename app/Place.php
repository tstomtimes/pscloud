<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [];

    public function members()
    {
    	return $this->hasMany(Member::class);
    }

    public function reports()
    {
    	return $this->hasMany(Report::class);
    }

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
