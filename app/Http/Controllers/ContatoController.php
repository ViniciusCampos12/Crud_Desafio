<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContatoStoreRequest;
use App\Models\Contato;

class ContatoController extends Controller
{
    /**
     *
     * Injeta dependencia nos metodos
     * Injeta middleware auth para verificar se usuario esta logao
     *
     * @param Contato $contato
     */
    public function __construct(Contato $contato)
    {
        $this->middleware('auth');

        $this->contato = $contato;
    }

    /**
     * Retorna todos os registros
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = $this->contato->orderBy('id')->get();
        return view('contatos.index', compact('contatos'));
    }

    /**
     * Exibe o formulário de inserção
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Executa método que inseri dados no banco.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContatoStoreRequest $request)
    {

        $this->contato->name = $request->name;
        $this->contato->email = $request->email;
        $this->contato->contact = $request->contact;
        $this->contato->save();

        return redirect()->route('contato.index');
    }

    /**
     * Exibe um registro especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = $this->contato->find($id);

        return view('contatos.show', compact('contato'));
    }

    /**
     * Exibe o formulário para edição de um registro
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = $this->contato->find($id);
        return view('contatos.update', compact('contato'));
    }

    /**
     * Atualiza o registro selecionado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contato = $this->contato->find($id);
        $contato->fill($request->all());
        $contato->save();

        return redirect()->route('contato.index');
    }

    /**
     * Deleta um registro
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = $this->contato->find($id);
        $contato->delete();

        return redirect()->route('contato.index');
    }

    /**
     * Exibe um lista do registros deletados
     *
     * @return void
     */
    public function trashed()
    {
       $contatos = $this->contato->onlyTrashed()->get();;

       return view('trash.lixo', compact('contatos'));
    }

    /**
     * Restaura um registro do lixo
     *
     * @param [type] $id
     * @return void
     */
    public function restaurar($id)
    {
        $contato = $this->contato->withTrashed()->findOrFail($id);
        $contato->restore();

        return redirect()->back();
    }
}
