<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable =[
        'title','abstract','author_name','filename','no_pages','authors_email','keywords','journal_id',
    ];
    public function journal(){
        return $this->belongsTo(Journal::class);
    }
}
