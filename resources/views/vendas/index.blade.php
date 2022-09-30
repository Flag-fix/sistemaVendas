{{-- herda a view 'base' --}}
@extends('vendas.base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Total Vendas {{ $qtdVend }}</h2>
            <div class="row">
                <h5>Lote Promocional {{ $promocional }}</h5>
                <h5>1ª Lote {{ $loteAtual }}</h5>
            </div>
        </div>
        <div class="card-body">
            <a href="/vendas/create" class="btn btn-primary">Registrar Venda</a>
        </div>
    </div>
    {{-- se a variável $vehicles não existir, mostra um h3 com uma mensagem --}}
    @if (!isset($vendas))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
        {{-- senão, monta a tabela com o dados --}}
    @else
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Vendedor</th>
                <th scope="col">Item Vendido</th>
                <th scope="col">Quantidade Vendida</th>
            </tr>
            </thead>
            <tbody>
            {{-- itera sobre a coleção de veículos --}}
            @foreach ($dados as $v)
                <tr>
                    <td>{{$v->Vendedor}}</td>
                    <td> {{$v->Produto}} </td>
                    <td> {{ $v->qtd }} </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                {{-- mostra a qtde de veículos cadastrados. --}}
                <td colspan="5">Vendas Realizadas {{ $vendas->count() }}</td>
            </tr>
            </tfoot>
        </table>


    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection
