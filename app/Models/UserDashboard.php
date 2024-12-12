<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDashboard extends Model
{
    protected $fillable = [ 
        "name","email","address","phone","gender","country","city","skills","image","note"

    ];
}
