<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table ='chats';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
