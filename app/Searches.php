<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Searches extends Model
{
    protected $table = 'searches';
    protected $fillable = array('string', 'user_id',);
}
