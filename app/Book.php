<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['title','price','available','status','description','year_pub','content','cover_page','author_id',
    'isbn','category_id' ,'download_count'];
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function family(){
        return $this->belongsTo(Family::class);
    }
    public function purchase(){
        return $this->hasMany(Purchase::class);
    }
  
}
