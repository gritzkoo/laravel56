@extends('shared.masterpage')
@section('custom_head')
    <link rel="icon" href="{{ asset('assets/pandapix/img/favicon.png') }}">    
    {{--  <link rel="stylesheet" href="{{ asset('assets/src/css/dashboard.css') }}">  --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css') }}">
@stop
@section('maincontainer')

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img class="rounded-circle" src="{{ asset('assets/pandapix/img/panda-ico-fundo-branco.png') }}" width="30" height="30" alt="pandapix">
            {{config('pandapix.cliente')}}
        </a>
    
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::user()->usu_nome }}</a></li>
                <li class="nav-item"><a href="{{route('login.logout')}}" class="nav-link">Sair</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
    
    <footer>
        
    </footer>
@stop