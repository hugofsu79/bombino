<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // on renvoie la vue articles/index (catalogue) 
        // on y injecte la liste des articles, que l'on récupère simultanément
        return view('articles/index', [
            'articles' => Article::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // on met en place un validateur avec les critères attendus
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'highlighted' => 'required',
            'ingredients' => 'required|min:10|max:100',
            'allergens' => 'nullable|max:100',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'gamme_id' => 'required'
        ]);
        // Création de l'article
        Article::create([
            'name'                  => $request->name,
            'highlighted'           => $request->highlighted,
            'ingredients'           => $request->ingredients,
            'allergens'             => $request->allergens,
            'image'                 => uploadImage($request['image']),
            'price'                 => $request->price,
            'gamme_id'              => $request->gamme_id,
        ]);

        // on redirige vers l'accueil du back-office
        return redirect()->route('admin')->with('message', 'Article créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Article $article)
    {
        $article->load(['highlighted' => function ($query) {
            $query->whereDate('date_debut', '<=', date('Y-m-d'))
                ->whereDate('date_fin', '>=', date('Y-m-d'));
        }]);

        return view('articles/show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Article $article)
    {

        return view('articles/edit', [
            'article' => $article,
            'gammes' => Gamme::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'name' => 'required|min:4|max:30',
            'ingredients' => 'required|min:10|max:100',
            'allergens' => 'nullable|max:100',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'highlighted' => 'required',
            'gamme_id' => 'required',
        ]);

        $article->update([
            'name'                   => $request->name,
            'ingredients'           => $request->ingredients,
            'allergens' => $request->allergens,
            'image'                 => isset($request['image']) ? uploadImage($request['image']) : $article->image,
            'price'                  => $request->price,
            'highlighted'                  => $request->highlighted,
            'gamme_id'                 => $request->gamme_id,
        ]);
        return redirect()->route('admin')->with('message', 'Article modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin')->with('message', 'L\'article a bien été supprimé');
    }
}
