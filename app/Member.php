<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    public function authority()
    {
    	return $this->hasOne(Authority::class);
    }

    public function employment_status()
    {
        return $this->belongsTo(EmploymentStatus::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function times()
    {
        return $this->hasMany(Time::class);
    }
}
