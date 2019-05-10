<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function report_details()
    {
    	return $this->hasMany(ReportDetail::class);
    }
}
