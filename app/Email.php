<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $fillable = ['name'];
	
    public function message(){
    	return $this->hasMany('App\Message');
    }
}
