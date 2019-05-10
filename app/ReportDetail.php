<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    protected $guarded = [];

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }

    public function report()
    {
    	return $this->belongsTo(Report::class);
    }
}
