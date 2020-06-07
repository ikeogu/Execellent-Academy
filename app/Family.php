<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    //
    protected $fillable = ['name', 'description'];
    public function book(){
        return $this->hasMany(Book::class);
    }

    public function article(){
        return $this->hasMany(Article::class);
    }
}
