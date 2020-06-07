<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['name','sex', 'dob','pob','education', 'book_authored','photo','biography','email'];
    
    public function book(){
        return $this->hasMany(Book::class);
    }
    
}
