{{-- herda a view 'base' --}}
@extends('vendas.base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h3>Cadastro de Venda</h3></div>
                    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
                    <form class="form" method="POST" action="{{$action}}">
                        {{-- CSRF é um token de segurança para validar o formulário --}}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vendedor_id">Vendedor:</label>
                                    <select name="vendedor_id" id=""
                                            class="form-control @error('name') is-invalid @enderror "
                                            data-select2-id="17" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled selected="selected">Selecione Vendedor</option>
                                        @foreach($vendedor as $vend)
                                            <option value="{{$vend->id}}">
                                                {{$vend->nome}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="produto_id">Convite:</label>
                                    <select name="produto_id" id=""
                                            class="form-control @error('name') is-invalid @enderror "
                                            data-select2-id="17" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled selected="selected">Selecione Convite</option>
                                        @foreach($produto as $prod)
                                            <option value="{{$prod->id}}">
                                                {{$prod->nome}} - {{$prod->valor}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="sel1" class="form-label">Selecione Quantidade:</label>
                                    <select class="form-select" name="qtd" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="data-venda">Data da Venda</label>
                                    <input type="date" class="form-control" name="data-venda" id="data-venda" placeholder="Data Venda" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <label>
                                <button type="submit" class="btn btn-success btn mr-3">Salvar</button>
                                <a class="btn btn-danger btn mr-3" href="/vendas">Cancelar</a>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
