@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Nova Entidade</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="">Entidades</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-green">Nova Entidade</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <form class="app_form" action="" method="post">

                    <label class="label_g2">
                        <label class="label">
                            <span class="legend">*Razão Social:</span>
                            <input type="text" name="social_name" placeholder="Razão Social" value=""/>
                        </label>

                        <label class="label">
                            <span class="legend">CNPJ:</span>
                            <input type="tel" name="CNPJ" class="mask-cnpj" placeholder="CNPJ da Entidade"
                                   value=""/>
                        </label>
                    </label>

                    <div class="label_g2">
                        <label class="label">
                            <span class="legend">Inscrição Estadual:</span>
                            <input type="text" name="IE" placeholder="Número da Inscrição"
                                   value=""/>
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
                                    <input type="tel" name="CEP" class="mask-zipcode zip_code_search"
                                           placeholder="Digite o CEP" value=""/>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Endereço:</span>
                                <input type="text" name="street" class="endereco" placeholder="Endereço Completo"
                                       value=""/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Número:</span>
                                    <input type="text" name="numero" placeholder="Número do Endereço" value=""/>
                                </label>

                                <label class="label">
                                    <span class="legend">Complemento:</span>
                                    <input type="text" name="complemento" placeholder="Completo" value=""/>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Bairro:</span>
                                <input type="text" name="bairro" class="neighborhood" placeholder="Bairro"
                                       value=""/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Estado:</span>
                                    <input type="text" name="estado" class="state" placeholder="Estado" value=""/>
                                </label>

                                <label class="label">
                                    <span class="legend">*Cidade:</span>
                                    <input type="text" name="cidade" class="city" placeholder="Cidade" value=""/>
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
