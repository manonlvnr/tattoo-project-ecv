<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flash;
use App\Models\User;

class HomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        // $flashes = Flash::where('active', 1)->limit(9)->get();
        $flashes = Flash::with('pictureFile')->where('active', 1)->limit(9)->get();
        $tatoueurs = User::where('type', 1)->limit(9)->get();

        var_dump($tatoueurs);
        return view('main', [
            'flashes' => $flashes,
            'tatoueurs' => $tatoueurs
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}
