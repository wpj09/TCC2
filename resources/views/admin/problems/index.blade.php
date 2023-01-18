@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-bug">Problemas</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.problem.index') }}" class="text-green">Problemas</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        @foreach($problems as $problem)
            <div class="dash_content_app_box">
                <div class="dash_content_app_box_stage">
                    <div class="realty_list">
                        <div class="realty_list_item mt-1 mb-1">
                            @foreach($problem['Image'] as $image)
                                @if(!empty($image))
                                    <div class="realty_list_item_actions_stats">
                                        <img src="{{ $image['path'] }}" alt="">
                                    </div>
                                @else
                                    <div class="realty_list_item_actions_stats">
                                        <img
                                            src="{{ url(asset('backend/assets/images/img.png')) }}"
                                            alt="">
                                    </div>
                                @endif
                            @endforeach

                            <div class="realty_list_item_content">
                                <h4>{{ $problem['id'] }} - {{ $problem['title'] }}</h4>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-binoculars"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Status:</span>
                                        <span
                                            class="realty_list_item_description_content">{{ $problem['status'] }}</span>
                                    </div>
                                </div>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-balance-scale"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Entidade:</span>
                                        <span
                                            class="realty_list_item_description_content">{{ $problem['entity'] }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="realty_list_item_actions">
                                <div>
                                    <a href="{{ route('admin.problem.edit', ['id' => $problem['id']]) }}"
                                       class="btn btn-green icon-pencil-square-o">Editar Problema</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
