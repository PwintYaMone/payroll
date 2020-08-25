<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

		public $fillable=['employee_id','age','height','father_name'];

	public function employee(){

		return $this->belongsTo('App\Employee');
	}
    

    }
