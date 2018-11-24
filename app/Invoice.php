<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $guarded = [];

     public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function paid(){
    	if ($this->payment_status == 'Invalid'){
    		return false;
    	}else{
    		return true;
    	}
    }
}
