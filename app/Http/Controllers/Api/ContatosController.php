<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{

    
    /**
     * Lista todos os contatos pelo usuário logado
     */
    public function index(Request $request)
    {
        // $id = AuthSession::id();
        $id = auth()->id();
        $contatos = Contatos::where('user_id',$id)->get();
        // $contatos = Contatos::with('user')->findOrFail($id);
        return json_encode(['data'=>$contatos->toArray(), 'id' => $id]);
    }

    /**
     * listar os contatos na pagina principal
     */
    public function dashboard(Request $request){
        $user_id = auth()->id();
        $contatos = Contatos::select(['nome', 'cidade', 'cpf', 'latitude', 'longitude'])->where('user_id',$user_id)->get();
        return json_encode(['data'=>$contatos->toArray(), 'id' => $user_id]);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
