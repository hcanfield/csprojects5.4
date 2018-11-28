<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Bid extends Model
{
    protected $fillable = [
        'project_id', 'user_id'
    ];
}