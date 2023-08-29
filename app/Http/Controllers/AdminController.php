<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Gamme;
use App\Models\Highlighted;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $gammes = Gamme::All();
        $Highlighted = Highlighted::All();
        $booking = Booking::All();


        return view('backoffice.index', [
            'articles'      => $articles,
            'gammes'        => $gammes,
            'Highlighted'   => $Highlighted,
            'booking'       => $booking
        ]);
    }
}
