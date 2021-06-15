<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    protected $table ='assets';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
