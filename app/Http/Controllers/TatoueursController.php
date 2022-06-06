<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TatoueursController extends Controller
{
    /**
     * Show tatoueurs page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $tatoueurs = User::where('type', 1)->paginate(30);

        // VUE //
        return view('tatoueurs', [
            'tatoueurs' => $tatoueurs
        ]);
    }
}
