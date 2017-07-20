<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
	protected $fillable = ['quote', 'title', 'author_id'];
	
    public function author(){
    	return $this->belongsTo('App\Author');
    }
}
