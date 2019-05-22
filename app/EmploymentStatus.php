<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    protected $guarded = [];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
