@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Novo Cliente</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-green">Novo Cliente</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="nav">
                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                </ul>

                <form class="app_form" action="" method="post" enctype="multipart/form-data">
                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_gc">
                                <span class="legend">Perfil:</span>
                                <label class="label">
                                    <input type="checkbox" name="admin"><span>Administrativo</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" name="client"><span>Cliente</span>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Nome:</span>
                                <input type="text" name="name" placeholder="Nome Completo" value=""/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Genero:</span>
                                    <select name="genre">
                                        <option value="male">Masculino</option>
                                        <option value="female">Feminino</option>
                                        <option value="other">Outros</option>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">*CPF:</span>
                                    <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                           value=""/>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*RG:</span>
                                    <input type="text" name="document_secondary" placeholder="RG do Cliente"
                                           value=""/>
                                </label>

                                <label class="label">
                                    <span class="legend">Órgão Expedidor:</span>
                                    <input type="text" name="document_secondary_complement" placeholder="Expedição"
                                           value=""/>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Data de Nascimento:</span>
                                    <input type="tel" name="date_of_birth" class="mask-date"
                                           placeholder="Data de Nascimento" value=""/>
                                </label>

                                <label class="label">
                                    <span class="legend">*Naturalidade:</span>
                                    <input type="text" name="place_of_birth" placeholder="Cidade de Nascimento"
                                           value=""/>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Estado Civil:</span>
                                    <select name="civil_status">
                                        <optgroup label="Cônjuge Obrigatório">
                                            <option value="married">Casado</option>
                                            <option value="separated">Separado</option>
                                        </optgroup>
                                        <optgroup label="Cônjuge não Obrigatório">
                                            <option value="single">Solteiro</option>
                                            <option value="divorced">Divorciado</option>
                                            <option value="widower">Viúvo</option>
                                        </optgroup>
                                    </select>
                                </label>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Endereço</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*CEP:</span>
                                            <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                                   placeholder="Digite o CEP" value=""/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Endereço:</span>
                                        <input type="text" name="street" class="street"
                                               placeholder="Endereço Completo" value=""/>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Número:</span>
                                            <input type="text" name="number" placeholder="Número do Endereço"
                                                   value=""/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                   value=""/>
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood"
                                               placeholder="Bairro" value=""/>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                   value=""/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                   value=""/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Contato</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Residencial:</span>
                                            <input type="tel" name="telephone" class="mask-phone"
                                                   placeholder="Número do Telefonce com DDD" value=""/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">*Celular:</span>
                                            <input type="tel" name="cell" class="mask-cell"
                                                   placeholder="Número do Telefonce com DDD" value=""/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Acesso</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">*E-mail:</span>
                                            <input type="email" name="email" placeholder="Melhor e-mail"
                                                   value=""/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Senha:</span>
                                            <input type="password" name="password" placeholder="Senha de acesso"
                                                   value=""/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
