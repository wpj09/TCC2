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
                    <div class="realty_list">
                        <div class="realty_list_item mt-1 mb-1">
                            <div class="realty_list_item_actions_stats">
                                <img
                                    src="{{ url(asset('backend/assets/images/agua.jpg')) }}"
                                    alt="">
                            </div>

                            <div class="realty_list_item_content">
                                <h4>#1 - Vazamento de água</h4>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-location"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Status:</span>
                                        <span class="realty_list_item_description_content">Aberto</span>
                                    </div>
                                </div>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-balance-scale"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Entidade:</span>
                                        <span class="realty_list_item_description_content">SANEAGO</span>
                                    </div>
                                </div>

                            </div>

                            <div class="realty_list_item_actions">
                                <div>
                                    <a href="" class="btn btn-green icon-pencil-square-o">Editar Problema</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
