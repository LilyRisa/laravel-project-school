<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    //
    use SoftDeletes;
    protected $table = 'banner';
    public $primaryKey  = 'banner_id';

    public function user()
    {
        return $this->belongsTo('App\User','idquote');
    }

}
