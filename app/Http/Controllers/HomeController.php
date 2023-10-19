<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;
use App\Models\Post;

class HomeController extends Controller
{
    // Function limit 3 cards/articles et les notes du produits
    public function index()
    {
        $gammes = Gamme::with('articles')->get();


        //je retourne la vue home en y injectant les posts
        return view('home', [
            'gammes' => $gammes
        ]);
    }
    public function politique()
    {
        return view('politique');
    }
}
