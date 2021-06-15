<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminService extends Model
{
    protected $table ='admin_services';
    protected $hidden = [
        'created_at', 'updated_at',
     ];
}
