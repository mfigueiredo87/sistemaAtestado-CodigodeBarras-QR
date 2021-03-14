<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class documento extends Model
{

    use SoftDeletes;//inactivar o registo

    public function efeito(){
        return $this->belongsTo('App\Models\Admin\efeito');
    	}

    	public function tipo(){
        return $this->belongsTo('App\Models\Admin\servico');
    	}

    	 public function direcao(){
        return $this->belongsTo('App\Models\Admin\direcao');
    	}

    	public function utilizador(){
        return $this->belongsTo('App\Models\Admin\admin');
    	}

         public function estado_documento(){
        return $this->belongsToMany('App\Model\Admin\estado_documento');//model da relacao
    }
     public function getRouteKeyName(){
        return 'created_at';
    }
}
