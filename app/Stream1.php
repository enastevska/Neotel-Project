<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream1 extends Model
{
    protected $guarded = [

    ];
    public function channels()
    {
        return $this->belongsTo('App\Channel')->select('id');
    }

    public function protocols()
    {
        return $this->hasMany('App\Protocol')->select('id');
    }
}
