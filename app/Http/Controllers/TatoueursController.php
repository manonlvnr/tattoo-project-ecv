<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Flash;

class TatoueursController extends Controller
{
    /**
     * Show tatoueurs page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {

        $tatoueurs = User::where('type', 1)->paginate(30);

        $locality = $request->input('locality');

        if (!empty($locality)) {
            $tatoueurs = User::where('type', 1)->where('locality', $locality)->paginate(30);
        }

        $locality_users = User::all();

        // VUE //
        return view('tatoueurs', [
            'tatoueurs' => $tatoueurs,
            'locality_users' => $locality_users
        ]);


    }

     /**
     * Show tatoueurs page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showTatoueur(Request $request) {

        $tatoueur = User::with('Flash')->findOrFail($request->id);

        // var_dump($tatoueur->flash);

        // $flashes = Flash::where('active', 1)->where('tattooist ', $request->id)->paginate(30);

        return view('showTatoueur', [
            'tatoueur' => $tatoueur,
            // 'flashes' => $flashes
        ]);
    }
}
