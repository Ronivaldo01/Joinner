<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pessoa;
use DB;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = DB::table('pessoa')
        ->join('pais','pessoa.pais_id', '=', 'pais.id')
        ->select('pessoa.id','pessoa.nome', 'pessoa.nascimento', 'pessoa.genero', 'pais.nome as pais')
        ->get();
        return view( "pessoas.index", compact('pessoas'));


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

     $pessoa = new Pessoa();
     $pessoa->nome = $request->input('nome');
     $pessoa->nascimento = $request->input('nascimento');
     $pessoa->genero = $request->input('genero');
     $pessoa->pais_id = $request->input('pais_id');
     return  $pessoa->save();



 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pessoas = DB::table('pessoa')
        ->join('pais','pessoa.pais_id', '=', 'pais.id')
        ->where('pessoa.id', '=' ,$id)
        ->select('pessoa.id','pessoa.nome', 'pessoa.nascimento', 'pessoa.genero', 'pessoa.pais_id', 'pais.nome as pais')
        ->get();

        foreach($pessoas as $pessoa)

            return json_encode($pessoa);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $pessoa = Pessoa::find($id);
        if($pessoa){
            $pessoa->nome = $request->input('nomeU');
            $pessoa->nascimento = $request->input('nascimentoU');
            $pessoa->genero = $request->input('generoU');
            $pessoa->pais_id = $request->input('pais_idU');
            $pessoa->save();
            return true;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);
        if($pessoa){
            $pessoa->delete();
            return true;
        }

        return false;
    }
}
