<?php

namespace App\Http\Controllers;

use App\Models\posicao;
use Illuminate\Http\Request;
use App\Http\Controllers\clubeController;

class posicaoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicao = new posicao();
		$posicaos = posicao::All();
        return view("posicao.index", [
			"posicaos" => $posicaos,
			"posicao" => $posicao
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validado = $request->validate([
			"nome" => "required",
            "descricao"=>"required"
		], [
			"required" => ":attribute é obrigatório",
		]);
		
		if ($request->get("id") != "") {
			$posicao = posicao::Find($request->get("id"));
		} else {
			$posicao = new posicao();
		}
		
		$posicao->NOME = $request->get("nome");
        $posicao->DESCRICAO = $request->get("descricao");
        
		
		$posicao->save();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "posicao salvo com sucesso!");
		
		return redirect("/posicao");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function showRegistrationForm()
    {
        $posicaos = posicao::All();
        return view('auth.register',compact('posicaos'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posicao = posicao::Find($id);
		$posicaos = posicao::All();
        return view("posicao.index", [
			"posicao" => $posicao,
			"posicaos" => $posicaos
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $posicao = posicao::Find($id);
		$posicao->delete();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "posicao excluído com sucesso!");
		
		return redirect("/posicao");
    }
}
