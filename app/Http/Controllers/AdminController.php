<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Gamme;
use App\Models\Highlighted;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('access_backoffice')) { // méthode 2 restriction accès : via Gate 
            abort(403, 'Vous n\'êtes pas administrateur : accès refusé');
        }


        $articles = Article::all();
        $gammes = Gamme::All();
        // $Highlighted = Highlighted::All();
        $booking = Booking::All();
        $users = User::with('role')->get();


        return view('backoffice.index', [
            'articles'      => $articles,
            'gammes'        => $gammes,
            // 'Highlighted'   => $Highlighted,
            'booking'       => $booking,
            'users' => $users
        ]);
    }
}
