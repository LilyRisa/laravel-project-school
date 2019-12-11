<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FindTeach extends Model
{
    use SoftDeletes;
    protected $table = 'findteach';
    public $primaryKey  = 'id';
    protected $fillable = ['fullname', 'address', 'phone', 'email', 'stclass', 'school', 'sex', 'learning', 'subject', 'sl', 'purpose', 'ask', 'status'];
}
