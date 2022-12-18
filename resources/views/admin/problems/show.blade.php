@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-bug">Edição Problema</h2>

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

            <div class="nav">

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Problema</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#images" class="nav_tabs_item_link ">Imagens do problema</a>
                    </li>
                </ul>

                <form action="" method="post" class="app_form" enctype="multipart/form-data">

                    <div class="nav_tabs_content">
                        <div id="data">
                            <label class="label">
                                <span class="legend">*Titulo do Problema:</span>
                                <input type="text" value=""/>
                            </label>

                            <label class="label">
                                <span class="legend">Descrição do Problema:</span>
                                <textarea name="" id="" cols="60" rows="5"></textarea>
                            </label>

                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">Inscrição Estadual:</span>
                                    <input type="text" name="IE" placeholder="Número da Inscrição"
                                           value=""/>
                                </label>

                                <label class="label">
                                    <span class="legend">*Status do Poblema:</span>
                                    <select name="status">
                                        <option value="on">Aberto</option>
                                        <option value="off">Resolvido</option>
                                    </select>
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
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[name="files[]"]').change(function (files) {

                $('.content_image').text('');

                $.each(files.target.files, function (key, value) {
                    var reader = new FileReader();
                    reader.onload = function (value) {
                        $('.content_image').append(
                            '<div class="property_image_item">' +
                            '<div class="embed radius" ' +
                            'style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;">' +
                            '</div>' +
                            '</div>');
                    };
                    reader.readAsDataURL(value);
                });
            });

            $('.image-set-cover').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.post(button.data('action'), {}, function (response) {
                    if (response.success === true) {
                        $('.property_image').find('a.btn-green').removeClass('btn-green');
                        button.addClass('btn-green');
                    }
                }, 'json');
            });

            $('.image-remove').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.ajax({
                    url: button.data('action'),
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (response) {

                        if (response.success === true) {
                            button.closest('.property_image_item').fadeOut(function () {
                                $(this).remove();
                            });
                        }
                    }
                })
            });
        });
    </script>
@endsection
