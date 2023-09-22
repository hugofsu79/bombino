<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use App\Models\Gamme;
use Illuminate\Http\Request;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gammes = Gamme::with('articles')->get();

        return view('gammes/index', [
            'gammes' => $gammes,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // $request c'est des données qui viennent du formulaire
    {                                      //$request['content'] = "Salut les gars"
        //1) On valide les champs en précisant les critères attendus
        $request->validate([
            //'name de l'input-> [critères]
            'nom' => 'required|min:5|max:100'
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        Gamme::create([                                  // 3 syntaxe possibles pour accéder au contenu de $request
            'nom' => $request->nom
        ]);

        //3) On redirige vers admin avec un message de succès
        return redirect()->route('admin')->with('message', 'Gamme créée avec succès');
    }

    public function edit(Gamme $gamme)
    {
        return view('gammes/edit', ['gamme' => $gamme]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gamme $gamme)
    {
        $request->validate([
            'nom' => 'required|min:5|max:100'
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
        $gamme->update($request->all());

        //3) On redirige vers l'accueil avec un message de succès
        return redirect()->route('admin')->with('message', 'Gamme modifié avec succès'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->delete();
        return redirect()->route('admin')->with('message', 'Gamme supprimée avec succès');
    }
}
