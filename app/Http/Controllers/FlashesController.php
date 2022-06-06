<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flash;
use App\Models\CategoryFlash;

class FlashesController extends Controller
{
    /**
     * Show home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // TRAITEMENT //
        // GET les flash

        $flashes = Flash::with('pictureFile')->where('active', 1)->paginate(30);
        $category_id = $request->input('category');

        if (!empty($category_id)) {
            $flashes = Flash::with('pictureFile')->where('active', 1)->where('category_flashes_id', $category_id)->paginate(30);
        }

        $categories = CategoryFlash::all();

        // VUE //
        return view('flashes', [
            'flashes' => $flashes,
            'categories' => $categories
        ]);
    }
}
