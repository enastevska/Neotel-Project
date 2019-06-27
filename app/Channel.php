<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'title',
    ];
    public function stream()
    {
        return $this->hasMany('App\Stream1')->select(['name','id']);
    }
}
