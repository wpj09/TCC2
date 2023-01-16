@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Nova Entidade</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.entities.index') }}">Entidades</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.entities.create') }}" class="text-green">Nova Entidade</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="message message-red">
                        <p class="icon-asterisk"> {{ $error }}</p>
                    </div>
                @endforeach
            @endif
            <div class="dash_content_app_box_stage">
                <form class="app_form" action="{{ route('admin.entities.store') }}" method="post">
                    @csrf

                    <label class="label_g2">
                        <label class="label">
                            <span class="legend">*Razão Social:</span>
                            <input type="text" name="social_name" placeholder="Razão Social"
                                   value="{{ old('social_name') }}"/>
                        </label>

                        <label class="label">
                            <span class="legend">CNPJ:</span>
                            <input type="tel" name="document_entity" class="mask-cnpj" placeholder="CNPJ da Entidade"
                                   value="{{ old('document_entity') }}"/>
                        </label>
                    </label>

                    <div class="label_g2">
                        <label class="label">
                            <span class="legend">Inscrição Estadual:</span>
                            <input type="text" name="document_entity_secondary" placeholder="Número da Inscrição"
                                   value="{{ old('document_entity_secondary') }}"/>
                        </label>

                        <label class="label">
                            <span class="legend">Contato:</span>
                            <input type="tel" name="telephone" class="mask-phone"
                                   placeholder="Número do Telefonce com DDD" value="{{ old('telephone') }}"/>
                        </label>
                    </div>

                    <div class="app_collapse">
                        <div class="app_collapse_header mt-2 collapse">
                            <h3>Endereço</h3>
                            <span class="icon-minus-circle icon-notext"></span>
                        </div>

                        <div class="app_collapse_content">
                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*CEP:</span>
                                    <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                           placeholder="Digite o CEP" value="{{ old('zipcode') }}"/>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Endereço:</span>
                                <input type="text" name="street" class="street"
                                       placeholder="Ex. Rua XX ou AV XX" value="{{ old('street') }}"/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Número:</span>
                                    <input type="text" name="number" placeholder="Número do Endereço"
                                           value="{{ old('number') }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">Complemento:</span>
                                    <input type="text" name="complement"
                                           placeholder="Exemplo: Quadra XX, Lote XX"
                                           value="{{ old('complement') }}"/>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Bairro:</span>
                                <input type="text" name="neighborhood" class="neighborhood" placeholder="Bairro"
                                       value="{{ old('neighborhood') }}"/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Estado:</span>
                                    <input type="text" name="state" class="state" placeholder="Estado"
                                           value="{{ old('state') }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">*Cidade:</span>
                                    <input type="text" name="city" class="city" placeholder="Cidade"
                                           value="{{ old('city') }}"/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar Entidade
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
