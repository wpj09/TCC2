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
                        <li><a href="{{ route('admin.users.index') }}" class="text-green">Usuários</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.users.create') }}" class="btn btn-green icon-user ml-1">Criar Usuário</a>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome Completo</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Nascimento</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="text-green">{{ $user->name }}</a></td>
                        <td>{{ $user->document }}</td>
                        <td><a href="mailto:{{ $user->email }}" class="text-green">{{ $user->email }}</a></td>
                        <td>{{ $user->date_of_birth }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
