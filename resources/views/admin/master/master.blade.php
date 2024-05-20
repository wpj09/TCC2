<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/reset.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/libs.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/boot.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/style.css')) }}"/>

    @hasSection('css')
        @yield('css')
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Prefeitura de {{ env('NAME_MUNICIPIO') }} - Site Control</title>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"></div>

<div class="dash">
    <aside class="dash_sidebar">
        <article class="dash_sidebar_user">
            <img class="dash_sidebar_user_thumb" src="{{ url(asset('backend/assets/images/avatar.jpg')) }}" alt=""
                 title=""/>

            <h1 class="dash_sidebar_user_name">
                <a href="{{ route('admin.users.edit', ['user' => \Illuminate\Support\Facades\Auth::user()->id]) }}">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </h1>
        </article>

        <ul class="dash_sidebar_nav">
            <li class="dash_sidebar_nav_item {{ isActive('admin.home') }}">
                <a class="icon-tachometer" href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.users') }}">
                @can('Listar Usuários')
                <a class="icon-users" href="{{ route('admin.users.index') }}">Usuários</a>
                @endcan
                <ul class="dash_sidebar_nav_submenu">
                    @can('Listar Usuários')
                        <li class="{{ isActive('admin.users.index') }}"><a href="{{ route('admin.users.index') }}">Ver
                                Todos</a></li>
                    @endcan
                    @can('Listar Usuários - Equipe')
                        <li class="{{ isActive('admin.users.team') }}"><a
                                href="{{ route('admin.users.team') }}">Time</a>
                        </li>
                    @endcan
                    @can('Cadastrar Usuário')
                        <li class="{{ isActive('admin.users.create') }}"><a href="{{ route('admin.users.create') }}">Criar
                                Novo</a></li>
                    @endcan
                </ul>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.entities') }}">
                @can('Listar Entidades')
                    <a class="icon-balance-scale" href="{{ route('admin.entities.index') }}">Entidade</a>
                @endcan
                <ul class="dash_sidebar_nav_submenu">
                    @can('Listar Entidades')
                        <li class="{{ isActive('admin.entities.index') }}"><a
                                href="{{ route('admin.entities.index') }}">Ver
                                Todos</a></li>
                    @endcan
                    @can('Cadastrar Entidade')
                        <li class="{{ isActive('admin.entities.create') }}"><a
                                href="{{ route('admin.entities.create') }}">Criar
                                Novo</a></li>
                    @endcan
                </ul>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.problem') }}">
                @can('Listar Problemas')
                    <a class="icon-bug" href="{{ route('admin.problem.index') }}">Problemas</a>
                @endcan
                @can('Listar Problemas')
                    <ul class="dash_sidebar_nav_submenu">
                        <li class="{{ isActive('admin.problem.index') }}"><a href="{{ route('admin.problem.index') }}">Ver
                                Todos</a></li>
                    </ul>
                @endcan
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.permission') }} {{ isActive('admin.role') }}">
                @can('Listar Perfis')
                <a class="icon-cogs" href="{{ route('admin.role.index') }}">Configurações</a>
                @endcan
                <ul class="dash_sidebar_nav_submenu">
                    @can('Listar Perfis')
                    <li class="{{ isActive('admin.role.index') }}"><a href="{{ route('admin.role.index') }}">Perfis</a>
                    </li>
                    @endcan
                    @can('Listar Permissões')
                    <li class="{{ isActive('admin.permission.index') }}"><a
                            href="{{ route('admin.permission.index') }}">Permissões</a></li>
                    @endcan
                </ul>
            </li>
            <li class="dash_sidebar_nav_item">
                <a class="icon-sign-out on_mobile" href="{{ route('admin.logout') }}">Sair</a>
            </li>
        </ul>

    </aside>

    <section class="dash_content">

        <div class="dash_userbar">
            <div class="dash_userbar_box">
                <div class="dash_userbar_box_content">
                    <span class="icon-align-justify icon-notext mobile_menu transition btn btn-blue"></span>
                    <h1 class="transition">
                        <i class="icon-clipboard text-green"></i>{{ env('name_municipio') }}<b>Admin</b>
                    </h1>
                    <div class="dash_userbar_box_bar no_mobile">
                        <a class="text-red icon-sign-out" href="{{ route('admin.logout') }}">Sair</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dash_content_box">
            @yield('content')
        </div>
    </section>
</div>


<script src="{{ url(mix('backend/assets/js/jquery.js')) }}"></script>
<script src="{{ url(asset('backend/assets/js/tinymce/tinymce.min.js')) }}"></script>
<script src="{{ url(mix('backend/assets/js/libs.js')) }}"></script>
<script src="{{ url(mix('backend/assets/js/scripts.js')) }}"></script>

@hasSection('js')
    @yield('js')
@endif

</body>
</html>
