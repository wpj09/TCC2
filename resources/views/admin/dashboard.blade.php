@extends('admin.master.master')

@section('content')
    <div style="flex-basis: 100%;">
        <section class="dash_content_app">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Dashboard</h2>
            </header>

            <div class="dash_content_app_box">
                <section class="app_dash_home_stats">
                    <article class="control radius">
                        <h4 class="icon-bug">Problemas</h4>
                        <p><b>Em andamento:</b> 100</p>
                        <p><b>Resolvidos:</b> 100</p>
                    </article>
                </section>
            </div>
        </section>

        <section class="dash_content_app" style="margin-top: 40px;">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Últimos Problemas Relatados</h2>
            </header>

            <div class="dash_content_app_box">
                <div class="dash_content_app_box_stage">
                    <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                        <thead>
                        <tr>
                            <th>Relator</th>
                            <th>Endereço</th>
                            <th>Setor</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="#" class="text-green">Robson V. Leite</a></td>
                            <td>Endereço</td>
                            <td>Setor</td>
                            <td>Cidade</td>
                            <td>Estado</td>
                            <td>Status</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
