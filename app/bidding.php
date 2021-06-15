<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidding extends Model
{
    protected $table = 'biddings';
    protected $hidden = [ 
    'created_at' ,	'updated_at'];
}
