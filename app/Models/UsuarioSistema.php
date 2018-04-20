<?php

namespace App\Models;

use App\Models\BaseModel;

class UsuarioSistema extends BaseModel
{
    protected $table = "usuario_sistema";
    protected $primaryKey = "usu_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usu_id',
        'usu_nome',
        'usu_senha',
        'usu_data_criacao',
        'usu_ultimo_acesso'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usu_senha'
    ];
}