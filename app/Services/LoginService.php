<?php

namespace App\Services;

use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use App\Models\UsuarioSistema;
use App\Models\UsuarioMakeLogin;
use App\Exceptions\NegocioException;

class LoginService extends BaseService
{
    /**
     * responsible to set a system session with Auth
     * @param @data array [
     *  'usu_nome'=>string
     *  'usu_senha'=>string
     * ]
     * @return mixed between NegocioException or string
     */
    public function login($data)
    {
        $this->_validate(
            $data,[
                'usu_nome' => 'required|max:156',
                'usu_senha'=> 'required|max:16'
            ],[
                'usu_nome' => 'Usuário',
                'usu_senha'=> 'Senha'
            ]
        );

        $user = UsuarioSistema::where(function($w)use($data){
            $w->where('usu_nome',$data['usu_nome']);
            $w->where('usu_senha',sha1($data['usu_senha']));
        })->first();

        if(!$user) throw new NegocioException('Usuário ou senha inválido');

        $usuarioMakeLogin = new UsuarioMakeLogin;
        $usuarioMakeLogin->set($user);

        $user->usu_ultimo_acesso = date('Y-m-d H:i:s');
        $user->save();

        Auth::guard('web')->login($usuarioMakeLogin, false);

        if(!Auth::user()) throw new NegocioException('Erro ao efetuar login');

        return 'OK';
    }
}