<?php

namespace lara3\Http\Controllers;

use Illuminate\Http\Request;
use lara3\Categoria;
use Illuminate\Support\Facedes\Redirect;
use lara3\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __connstruct(){
        //
    }
    public function index(Request $request){
        if($request){
            $query      = trim($request->get("SearchText"));
            $categorias = DB::table('categoria')
                            ->where('nomeCategoria', 'like', '%'.$query.'%')
                            ->where('condicao', '=', '1')
                            ->orderBy('idCategoria', 'desc')
                            ->paginate(7);
            return view("estoque.categoria.index", [
                                                        "categorias"=>$categorias, 
                                                        "searchText"=>$query
                                                   ]
            );
        }
    }
    public function create('estoque.categoria.create'){
        //
    }
    public function store(CategoriaFormRequest $request){
        $categoria = new Categoria;
        $categoria->nome=$request->get('nomeCategoria');
        $categoria->descricao=$request->get('descricao');
        $categoria->condicao=1;
        $categoria->save();
        return Redirect::to('estoque/categoria');
    }
    public function show($id){
        return view('estoque.categoria.show', [
            "categoria"=>Categoria::findOrFail($id);
        ])
    }
    public function edit($id){
        return view('estoque.categoria.edit', [
            "categoria"=>Categoria::findOrFail($id);
        ])
    }
    public function update(CategoriaFormRequest $request, $id){
        $categoria=>Categoria::findOrFail($id);
        $categoria->nome=$request->get('nomeCategoria');
        $categoria->descricao=$request->get('descricao');
        $categoria->update();
        return Redirect::to('estoque/categoria');
    }
    public function destroy(){
        $categoria=>Categoria::findOrFail($id);
        $categoria->condicao=0;
        $categoria->update();
        return Redirect::to('estoque/categoria');
    }
}
