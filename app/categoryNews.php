<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryNews extends Model
{
    protected $fillable=['title'];
    public function News()
    {
        return $this->hasMany(news::class,'categoryNews_id');
    }

}
