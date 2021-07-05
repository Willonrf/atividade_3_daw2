<?php

namespace App\Http\Controllers;

use App\Models\clube;
use Illuminate\Http\Request;

class clubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clube = new clube();
		$clubes = clube::All();
        return view("clube.index", [
			"clubes" => $clubes,
			"clube" => $clube
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
			"escudo" => "required|mimes:jpg,bmp,png,webp"
		], [
			"required" => ":attribute é obrigatório",
			"escudo.mimes" => "É necessário importar um arquivo de imagem (jpg, bmp, png, webp)"
		]);
		
		if ($request->get("id") != "") {
			$clube = clube::Find($request->get("id"));
		} else {
			$clube = new clube();
		}
		
		$clube->nome = $request->get("nome");
		
		$clube->escudo = $request->file("escudo")->store("clubes");
		
		$clube->save();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "Clube salvo com sucesso!");
		
		return redirect("/clube");
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
        $clube = clube::Find($id);
		$clubes = clube::All();
        return view("clube.index", [
			"clube" => $clube,
			"clubes" => $clubes
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
        $clube = clube::Find($id);
		\Storage::delete($clube->escudo);
		$clube->delete();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "clube excluído com sucesso!");
		
		return redirect("/clube");
    }
	
}