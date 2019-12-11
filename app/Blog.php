<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    //
    use SoftDeletes;
    protected $table = 'blog';
    public $primaryKey  = 'blog_id';

    public function user()
    {
        return $this->belongsTo('App\User','idquote');
    }
    public function image()
    {
    	return $this->belongsTo('App\Images');
    }
    public function category()
    {
    	return $this->belongsTo('App\category_child');
    }

}
