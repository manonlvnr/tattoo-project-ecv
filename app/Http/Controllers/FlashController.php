<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flash;


class FlashController extends Controller
{
    function index(){ 
        $flashes = Flash::paginate(50);
        return view('dashboard', ['flashes'=>$flashes]);
    }
}
