<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
