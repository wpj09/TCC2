@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-bug">Edição Problema</h2>

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

        <div class="dash_content_app_box">

            <div class="nav">

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Problema</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#images" class="nav_tabs_item_link ">Imagens do problema</a>
                    </li>
                </ul>

                <form action="{{ route('admin.problem.update', ['id' => $problem['id']]) }}" method="post"
                      class="app_form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="lat" value="{{ $problem['latitude'] }}">
                    <input type="hidden" id="lng" value="{{ $problem['longitude'] }}">
                    <div class="nav_tabs_content">
                        <div id="data">
                            <h2>Titulo do Problema: {{ $problem['title'] }}</h2>
                            <label class="label">
                                <h3>Descrição do Problema: {{ $problem['description'] }}</h3>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Entidade Competente:</span>
                                    <select name="entity">
                                        <option value="">Selecione uma entidade competente</option>
                                        @foreach($entities as $entity)
                                            <option value="{{ $entity->social_name }}">{{ $entity->social_name }} ({{ $entity->document_entity }})</option>
                                        @endforeach
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">*Status do Poblema:</span>
                                    <select name="status">
                                        <option
                                            value="open"{{ (old('status') == 'open' ? 'selected' : ($problem['status'] == 'open' ? 'selected' : '')) }}>
                                            Aberto
                                        </option>
                                        <option
                                            value="closed" {{ (old('status') == 'closed' ? 'selected' : ($problem['status'] == 'closed' ? 'selected' : '')) }}>
                                            Resolvido
                                        </option>
                                    </select>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Solução do problema:</span>
                                    <input type="text" name="solution" id="solution"
                                           value="{{ (old($problem['solution'] == '') ?? $problem['solution']) }}">
                                </label>
                            </div>

                            <div class="main_property_header  py-1 bg-light">
                                <div class="col-12 col-lg-8">
                                    <div class="main_property_location">
                                        <h2 class="text-front">Localização no Mapa</h2>
                                        <div id="map" style="width: 100%; min-height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="images" class="d-none">
                            <h2>Imagens</h2>

                            <div class="content_image"></div>

                            <div class="property_image">
                                <div class="property_image_item">
                                    <img src="" alt="">
                                    <div class="property_image_actions">
                                        <a href="javascript:void(0)"
                                           class="btn btn-small icon-check icon-notext image-set-cover"
                                           data-action=""></a>
                                        <a href="javascript:void(0)"
                                           class="btn btn-red btn-small icon-times icon-notext image-remove"
                                           data-action=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Editar Problema
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>

        function initMap() {

            ltd = document.getElementById("lat").value;
            lgt = document.getElementById("lng").value;

            const myLatLng = {lat: +ltd, lng: +lgt};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: myLatLng,
                mapTypeId: 'terrain'
            });

            new google.maps.Marker({
                position: myLatLng,
                map
            });
        }

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR6P9EfO4d0TnM4XorVr8W1VrgXMSzz_k&callback=initMap"></script>
@endsection
