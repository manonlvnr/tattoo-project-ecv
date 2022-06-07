<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PictureFile;
use App\Models\Flash;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    function profile(){
        $data = Auth::user();
        // dd($data);
        return view('managerProfile', ['user'=>$data]);
    }

    function flashes(){
        return view('managerFlashes');
    }

    function addFlash(){
        return view('managerAddFlash');
    }
    function calendar(){

        return view('managerCalendar');
    }

    function saveInfo(Request $req){
        $data= User::findOrFail($req->id);

        $data->name = $req->name;
        $data->birthdate = $req->birthdate;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->tattooist_name = $req->tattooist_name;
        $data->tattoo_parlor = $req->tattoo_parlor;
        

        $data->save();
        return redirect('/manager/profile');
    }

    function store(Request $request){
        
    //      $validatedData = $request->validate([
    //       'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
    //      ]);
    //     $name = $request->file('image')->getClientOriginalName();
        
    //     $path = $request->file('image')->store('public/images');
 
 
    //     $save = new PictureFile;
 
    //     $save->filename = $name;
    //     $save->mime = $path;
    //     $save->flash_id = Auth::user()->id;
 
    //     $save->save();
 
    //   return redirect('image-upload')->with('status', 'Image Has been uploaded')->with('image',$name);
 
    }

    function newFlash(Request $req){

        dd($req->all());
        $data = new Flash;
        $data->name = $req->name;
        $data->price = $req->price;
        $data->color = $req->color;

        $data->save();
        return redirect('/manager/flashes');

    }




}
