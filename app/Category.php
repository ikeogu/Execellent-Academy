<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
        'name', 'des','abbr', 'cover',
    ];
    public function publish(){
       
        return $this->hasMany('App\Publish');
    }  
    
    public function journal(){
        return $this->hasMany('App\Journal');
    }
    
}
