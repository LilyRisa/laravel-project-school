<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
	use SoftDeletes;
    protected $table = 'category';
    public $primaryKey  = 'id';

    function category_child(){
    	return $this->hasMany('App\category_child');
    }
}
