<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    
    public function index()
    {
        $produtos = Produto::orderBy('name', 'asc')->get();

        return view('produtos.index', ['prods' => $produtos, 'pagina' => 'produtos']);
    }

    public function show(Produto $prod)
    {
        return view('produtos.show', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function create()
    {
        return view('produtos.create', ['pagina' => 'produtos']);
    }

    public function insert(Request $formulario)
    {
        $imagemCaminho = $formulario->file('imagem')->store('', 'imagens');
        
        $prod = new Produto();
        $prod->name = $formulario->nome;
        
        $prod->price = $formulario->preco;
        $prod->description = $formulario->descricao;
        $prod->imagem = $imagemCaminho;
        $prod->save();
        return redirect()->route('produtos');
    }

    public function edit(Produto $prod)
    {
        return view('produtos.edit', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function update(Request $form, Produto $prod)
    {
        $prod->nome = $form->nome;
        $prod->preco = $form->preco;
        $prod->descricao = $form->descricao;

        $prod->save();

        return redirect()->route('produtos');
    }

    public function remove(Produto $prod)
    {
        return view('produtos.remove', ['prod' => $prod, 'pagina' => 'produtos']);
    }

    public function delete(Produto $prod)
    {
        $prod->delete();

        return redirect()->route('produtos');
    }

}
