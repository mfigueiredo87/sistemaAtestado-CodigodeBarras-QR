<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class utilizadores extends Model
{
    

    public function getNameAttribute($value){
        return ucfirst($value);
    }
        protected $fillable = [
        'name', 'email', 'password','phone','status','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
