<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = ['reference','amount','card_type','bank','book_id','email','paid_at'];

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
