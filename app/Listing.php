<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'list_name', 'distance', 'user_id'
    ];

    /** Get Listings */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
