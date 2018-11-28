<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // make a similar function to below for favorite projects
    public function projects() {
        return $this->hasMany("App\Project", 'ownerID', 'id');
    }

    public function favorites() {
        return $this->belongsToMany('App\Project', 'user_favorites');
    }

    public function bids() {
        return $this->belongsToMany('App\Project', 'user_bids');
    }

    public function projectsAssigned() {
        return $this->belongstoMany('App\Project', 'project_assignees');
    }
}
