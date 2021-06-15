<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{  protected $table = 'articals';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
