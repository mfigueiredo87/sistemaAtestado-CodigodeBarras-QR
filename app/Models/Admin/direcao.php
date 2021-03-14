<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class direcao extends Model
{
    use SoftDeletes;//inactivar o registo

    
    public function cargo(){
        return $this->belongsTo('App\Models\Admin\cargo');
    	}
}
