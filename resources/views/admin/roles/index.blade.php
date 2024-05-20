@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.role.index') }}" class="text-green">Perfis</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.role.create') }}" class="btn btn-green icon-pencil-square-o ml-1">
                    Criar Perfil
                </a>
            </div>
        </header>

        @if($errors->all())
            @foreach($errors->all() as $error)
                <div class="message message-red">
                    <p class="icon-asterisk"> {{ $error }}</p>
                </div>
            @endforeach
        @endif

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Perfil</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="d-flex">
                                <a class="mr-1 btn btn-green"
                                   href="{{ route('admin.role.edit', ['role' => $role->id]) }}"> Editar
                                </a>

                                <a class="mr-1 btn btn-green"
                                   href="{{ route('admin.role.permissions', ['role' => $role->id]) }}"> Permissões
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
