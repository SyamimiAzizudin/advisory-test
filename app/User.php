<?php

namespace App;

use App\Listing;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password', 'type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /** Get Listings */
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
    
}
