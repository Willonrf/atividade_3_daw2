<?php

namespace App\Http\Controllers;

use App\Models\jogador;
use App\Models\posicao;
use App\Models\clube;
use Illuminate\Http\Request;

class jogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogador = new jogador();
		$jogadors = jogador::All();
        $posicao = new posicao();
        $posicaos = posicao::All();
        $clube = new posicao();
        $clubes = clube::All();
        return view("jogador.index", [
			"jogadors" => $jogadors,
			"jogador" => $jogador,
            "posicao" => $posicao,
            "posicaos" => $posicaos,
            "clube" => $clube,
            "clubes" => $clubes,
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
			"dataNascimento" => "required",
            "clube_id" => "required",
            "posicao_id" => "required",
            "possui" => "required"
		], [
			"required" => ":attribute é obrigatório",
		]);
		
		if ($request->get("id") != "") {
			$jogador = jogador::Find($request->get("id"));
		} else {
			$jogador = new jogador();
		}
        $today = getdate();
		if($request->get("dataNascimento") < $today){
            $jogador->NOME = $request->get("nome");
            $jogador->DATA_NASCIMENTO = $request->get("dataNascimento");
            $jogador->ID_CLUBE = $request->get("clube_id");
            $jogador->ID_POSICAO = $request->get("posicao_id");
            if($request->get("possui") == '1'){
                $jogador->POSSUI = true;
            }else{
                $jogador->POSSUI = false;
            }
            $jogador->save();
            
            $request->Session()->flash("status", "sucesso");
            $request->Session()->flash("mensagem", "jogador salvo com sucesso!");
        }
        $request->Session()->flash("status", "falha");
        $request->Session()->flash("mensagem", "Data invalida");
		return redirect("/jogador");
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = jogador::Find($id);
		$jogadors = jogador::All();
        return view("jogador.index", [
			"jogador" => $jogador,
			"jogadors" => $jogadors
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
        $jogador = jogador::Find($id);
		$jogador->delete();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "jogador excluído com sucesso!");
		
		return redirect("/jogador");
    }
}
