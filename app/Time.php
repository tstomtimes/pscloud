<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $guarded = [];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
