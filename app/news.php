<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable=['title','content','iamge','categoryNews_id'];

    public function Category()
    {
        return $this->belongsTo(categoryNews::class,'categoryNews_id');
    }
    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
