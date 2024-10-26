<?php

namespace App\Http\Controllers;

use App\Models\Contatos;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContatosController extends Controller
{
    /**
     * Form de edição de contato
     */
    public function index(): View
    {
        return view('contatos', [
            
        ]);
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
    public function update(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nome' => ['required'],
            'cpf' => ['required'],
        ]);

        $id = $request->id;

        if($id){
            $contatos = Contatos::find($id);
        }else{
            $contatos = new Contatos();
            $id = "";
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
            return Redirect::route('contatos.edit', $id)->with('error', 'Houve um problema ao tentar salvar.');

        }
    
        
    }

    /**
     * Delete contato
     */
    public function destroy(Request $request): RedirectResponse
    {

        $user = $request->user();

        $user->delete();

        return Redirect::to('/');
    }

}
