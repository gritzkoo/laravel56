@extends('shared.masterpage')
@section('maincontainer')
<style>
    .login-container {
        border-radius: 5px;
        border: 2px solid rgba(95, 95, 95, 0.9);
        background-color: #FFFFFF;
        top: 10vw;
        padding: 3em;
    }
</style>
<div class="container" id="loginko">
    <div class="row justify-content-md-center form-group">
        <div class=" col col-md-6 col-lg-4 login-container">
            <row class="form-row">
                <div class="col mb-3">
                    <img class="mx-auto d-block rounded-circle" src="{{asset('assets/pandapix/img/favicon.png')}}" alt="pandapix"/>
                </div>
            </row>
            <row class="form-row">
                <div class="col mb-3">
                    <input type="text" class="form-control" placeholder="Nome" data-bind="value:usu_nome,enterkey:logar,valueUpdate:'afterkeydown'" maxlength="156">
                </div>
            </row>
            <row class="form-row">
                <div class="col mb-3">
                    <input type="password" class="form-control" placeholder="Senha" data-bind="value:usu_senha,enterkey:logar,valueUpdate:'afterkeydown'" maxlength="16">
                </div>
            </row>
            <row class="form-row">
                <div class="col mb-3">
                    <button class="btn btn-info float-right" data-bind="click:logar">Login</button>
                </div>
            </row>
        </div>
    </div>
</div>
    <script>
        var vmlogin = new LoginModel;
        function LoginModel()
        {
            var me = this;
            me.usu_nome = ko.observable().extend({
                required:{message:'O campo nome é obrigatório'},
                maxLenght:{params:156,message:'O campo nome tem tamanho máximo de 156 caracteres'}
            });
            me.usu_senha = ko.observable().extend({
                required:{message:'O campo senha é obrigatório'},
                maxLenght:{params:16,message:'O campo senha tem tamanho máximo de 16 caracteres'}
            });
            me.erros = ko.validation.group(me);

            me.logar = function()
            {
                if(me.erros().length>0)
                {
                    ko.utils.arrayForEach(me.erros(),function(err){
                        Alert.error(err,'Validação');
                    });
                    return;
                }
                let payload = {
                    usu_nome  : ko.unwrap(me.usu_nome),
                    usu_senha : ko.unwrap(me.usu_senha)
                };
                base.post("{{route('login.login')}}",payload,function(resp){
                    if(resp.status == 1){
                        window.location.href = "{{ route('painel.index') }}";
                    } else {
                        Alert.error(resp.message);
                    }
                })
            }
        }
        $(function()
        {
            ko.applyBindings(vmlogin,document.getElementById('loginko'));
            $("body").css('background-image', 'url("{{ asset('assets/pandapix/img/view-poll-background.jpg') }} ")');
        })
    </script>
@stop