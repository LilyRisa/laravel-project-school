<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category_child extends Model
{
	use SoftDeletes;
    protected $table = 'category_child';
    public $primaryKey  = 'id';

    function category(){
    	return $this->belongsTo('App\category');
    }
}
