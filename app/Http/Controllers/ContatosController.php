<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatosPostRequest;
use App\Models\Contatos;
use Dotenv\Validator;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;

class ContatosController extends Controller
{
    /**
     * Form de edição de contato
     */
    public function index(Request $request): View
    {
        $api_token = $request->session()->get("api_token");
        return view('contatos', ['api_token'=> $api_token]);
    }

    /**
     * Form de edição de contato
     */
    public function edit(Request $request): View
    {
        $id = $request->route("id");
        $contatos = Contatos::find($id);
        
        return view('contatos.edit', [
            'contatos' => $contatos,
            'title' => "Editar Cadastro - $contatos->nome"
        ]);
    }

    /**
     * Form de cadastro de contato
     */
    public function create(Request $request): View
    {
        $contatos = new Contatos;

        return view('contatos.edit', [
            'contatos' => $contatos,
            'title' => "Novo Cadastro"
        ]);
        
    }

    /**
     * Update do contato
     */
    public function update(ContatosPostRequest $request): RedirectResponse
    {

        $id = $request->id;
        $user_id = $request->user()->id;
        if($id){
            $contatos = Contatos::find($id);
        }else{
            $contatos = new Contatos();
            $id = "";
            $contatos->user_id = $user_id;
        }
 
        $contatos->nome = $request->nome;
        $contatos->email = $request->email;
        $contatos->cpf = $request->cpf;
        $contatos->telefone = $request->telefone;
        $contatos->logradouro = $request->logradouro;
        $contatos->numero = $request->numero;
        $contatos->complemento = $request->complemento;
        $contatos->bairro = $request->bairro;
        $contatos->cidade = $request->cidade;
        $contatos->uf = $request->uf;
        $contatos->cep = $request->cep;
        $contatos->latitude = $request->latitude;
        $contatos->longitude = $request->longitude;
        
        try{
            $contatos->save();
            $id = $contatos->id;
            return Redirect::route('contatos.edit', $id)->with('success', 'Cadastro Salvo');
        }catch(Exception $e){
            if($id){
                return Redirect::route('contatos.edit', $id)->with('error', 'Houve um problema ao tentar salvar.');
            }else{
                return Redirect::route('contatos.create')->with('error', 'Houve um problema ao tentar salvar.');
            }
        }
    }

    /**
     * Delete contato
     */
    public function destroy(Request $request)
    {
        $id = $request->route("id");
        try{
            if($id){
                $contatos = Contatos::find($id);
                $contatos->delete();
            }
            return response()->json(['success' => true, 'message'=> "Cadastro Excluido."]);
        }catch(Exception $e){
            return response()->json(['error' => true, 'message'=> "Não Foi Possível Excluir."]);
        }
    }

}
