<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //
    protected $fillable = ['name','vol','month','year','category_id'];

    public function publish(){
        return $this->hasMany(Published::class);
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

   
}
