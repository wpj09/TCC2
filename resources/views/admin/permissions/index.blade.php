@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li>
                            <a href="{{ route('admin.home') }}">Dashboard</a>
                        </li>

                        <li class="separator icon-angle-right icon-notext"></li>

                        <li>
                            <a href="{{ route('admin.permission.index') }}" class="text-green">Permissões</a>
                        </li>
                    </ul>
                </nav>

                <a href="{{ route('admin.permission.create') }}" class="btn btn-green icon-pencil-square-o ml-1">
                    Criar Permissão
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
                        <th>Permissão</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="d-flex">
                                <a class="mr-1 btn btn-green"
                                   href="{{ route('admin.permission.edit', ['permission' => $permission->id]) }}">
                                    Editar
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
