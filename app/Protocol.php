<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    protected $guarded = [

    ];

    public function streams()
    {
        return $this->belongsTo('App\Stream1')->select('id');
    }
}
