<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class OfflineController extends Controller
{

    /**
     * Exibe todos registros do lixo
     *
     * @return void
     */
    public function index()
    {
        $contatos = Contato::orderBy('id')->get();

        return view('offline.index_off', compact('contatos'));
    }
}
