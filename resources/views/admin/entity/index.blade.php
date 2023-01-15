@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Entidades</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-green">Entidades</a></li>
                    </ul>
                </nav>

                <a href="dashboard.php?app=companies/create" class="btn btn-green icon-building-o ml-1">Criar
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
                    <tr>
                        <td><a href="" class="text-green">SANEAGO</a></td>
                        <td>12.345.678/0001-00</td>
                        <td>Rua central, lote Central</td>
                        <td>656555555</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
