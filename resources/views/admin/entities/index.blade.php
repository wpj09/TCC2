@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Entidades</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.entities.index') }}" class="text-green">Entidades</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.entities.create') }}" class="btn btn-green icon-building-o ml-1">Criar
                    Entidade</a>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Endereço</th>
                        <th>IE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entities as $entity)
                        <tr>
                            <td><a href="{{ route('admin.entities.edit', ['entity' => $entity->id]) }}" class="text-green">{{ $entity->social_name }}</a></td>
                            <td>{{ $entity->document_entity }}</td>
                            <td>{{ $entity->street }}, {{ $entity->complement }}</td>
                            <td>{{ $entity->document_entity_secondary }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
