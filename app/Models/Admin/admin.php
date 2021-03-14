<?php

namespace App\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class admin extends Authenticatable
{
       use Notifiable;
       use SoftDeletes;
       
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

      //acessors para validacao dos menus
    public function getIsAdminAttribute()
    {
        return $this->role ==0;//administrador
    } 
    public function getIsSecretariaAttribute()
    {
        return $this->role ==1;
    }
   
    //convertendo os numeros de roles para nomes
       public function getIsRoleAttribute(){
        //criar um switch para alterar

        if($this->role == 0)
            return 'Administrador';
        //se o superid for de suport o estado passa para resolvido
        if($this->role == 1)
            return 'Secretaria Nivel 1';
        //em ultimos casos pendentes
        return 'Secretaria Nivel 2';

    }
}

