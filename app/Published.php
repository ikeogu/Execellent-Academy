<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Published extends Model
{
    //
    protected $fillable =[
        'title','abstract','author_name','filename','no_pages','authors_email','keywords','journal_id','month'
    ];

    public function journal(){
        return $this->belongsTo(Journal::class);
    }
}
