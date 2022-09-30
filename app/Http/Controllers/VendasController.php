<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use App\Models\Vendedor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $vendas = Venda::orderBy('created_at', 'desc')->get();
        $promocional = DB::table('vendas')
            ->leftJoin('produto', 'produto.id','=', 'vendas.produto_id')
            ->where('produto.id','=',2)->sum('vendas.qtd');

        $loteAtual= DB::table('vendas')
            ->leftJoin('produto', 'produto.id','=', 'vendas.produto_id')
            ->where('produto.id','=',3)->sum('vendas.qtd');

        $dados = DB::select(
            "select v.nome as Vendedor,  SUM(venda.qtd) AS qtd, p.nome Produto
                    from vendas venda
                        inner join vendedor v on v.id = vendedor_id
                        left join produto p on p.id = venda.produto_id
                        GROUP by v.nome, p.nome ");

        $qtdVend =  0;
        foreach ($vendas as $vend){
            $qtdVend+= $vend['qtd'];
        }
        return view('vendas.index', compact('vendas', 'qtdVend', 'promocional', 'loteAtual', 'dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $vendedor = Vendedor::all();
        $produto = Produto::all();
        $action = route('vendas.store');
        return view('vendas.create', compact('action', 'vendedor','produto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        Venda::create($request->all());
        DB::Commit();
        return redirect()->route('vendas.index')->with('msg','Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
