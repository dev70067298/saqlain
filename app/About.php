<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table ='about';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
