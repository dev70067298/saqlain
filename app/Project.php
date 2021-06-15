<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
