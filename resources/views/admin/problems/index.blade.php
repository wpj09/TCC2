@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-bug">Problemas</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-green">Problemas</a></li>
                    </ul>
                </nav>
            </div>
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
        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <div class="realty_list">
                    <div class="realty_list_item mt-1 mb-1">
                        <div class="realty_list_item_actions_stats">
                            <img
                                src="{{ url(asset('backend/assets/images/buraco.jpeg')) }}"
                                alt="">
                        </div>

                        <div class="realty_list_item_content">
                            <h4>#2 - Buracos na rua</h4>

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
                                    <span class="realty_list_item_description_content">PREFEITURA MUNICIPAL</span>
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
@endsection
