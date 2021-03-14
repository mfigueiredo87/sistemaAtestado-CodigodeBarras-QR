<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class custo_servico extends Model
{
     public function custo(){
        return $this->belongsTo('App\Models\Admin\custo');
    	}

    public function servico(){
        return $this->belongsTo('App\Models\Admin\servico');
    	}

    // public function getServicoDescricaoAttribute(){
    //     if($this->servico)
    //         return $this->servico->descricao;

    //     //else
    //     return 'Não Registado';
    // }
}
