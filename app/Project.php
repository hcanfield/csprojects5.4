<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'id'
    ];

    public function bids() {
        return $this->belongsToMany('App\User', 'user_bids');
    }

    public function assigned() {
        return $this->belongstoMany('App\User', 'project_assignees');
    }
}