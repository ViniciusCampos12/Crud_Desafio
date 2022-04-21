<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContatoStoreRequest;
use App\Models\Contato;

class ContatoController extends Controller
{
    public function __construct(Contato $contato)
    {
        $this->middleware('auth');

        $this->contato = $contato;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = $this->contato->orderBy('id')->get();
        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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

    public function trashed()
    {
       $contatos = $this->contato->onlyTrashed()->get();;

       return view('trash.lixo', compact('contatos'));
    }

    public function restaurar($id)
    {
        $contato = $this->contato->withTrashed()->findOrFail($id);
        $contato->restore();

        return redirect()->back();
    }
}
