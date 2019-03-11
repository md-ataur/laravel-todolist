<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
	/* Accessor */
	function getTitleAttribute($value){
		return ucfirst($value);
	}

	/* Mutator */
	function setTitleAttribute($value){
		return $this->attributes['title'] = ucfirst($value);
	}
}
