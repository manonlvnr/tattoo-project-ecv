<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PictureFile;
use App\Models\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;


class ManagerController extends Controller
{

    // PROFIL
    function profile(){
        $data = Auth::user();
        // dd($data);
        return view('managerProfile', ['user'=>$data]);
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


    // FLASHES

    function flashes(){
        $data = [];
        if(Flash::find(Auth::user())){
            // $data = User::find(Auth::user()->id)->getFlashes();
            $data = Flash::with('pictureFile')->get();
            return view('managerFlashes', ['flashes'=>$data]);
        }else{
            return view('managerFlashes', ['flashes'=>$data]);
            
        }
       
        
    }

    function newFlash(Request $req){
 

        $data = new Flash;
        $data->name = $req->name;
        $data->price = $req->price;
        $data->color = 1;

        if($req->active){
            $data->active = 1;
        }else{
            $data->active = 0;
        }
        $data->order = "0";
        $data->tattooist_id = Auth::user()->id;

        $data->save();

        $flash_id = Flash::latest()->first()->id;
        

        if ($req->hasFile('fileImage')){ 
            $originaleFilename = $req->file('fileImage');
            $name = $originaleFilename->getClientOriginalName();
            $originaleFilename->move(public_path().'/images/flashes/', $name);
            $image = new PictureFile();
            $image->filename = $name;
    
            $image->flash_id = $flash_id;
            $image->save();
           
         }


        return redirect('/manager/flashes');

    }


    function editFlash($id){

        $data = Flash::findOrFail($id);
        if(Auth::id() != $data->tattooist_id){
            abort(404);
        }   
        
        return view('managerEditFlash', ['flash'=>$data]);
    }

    function deleteFlash($id){
        

        // Suppression de l'image associ??e
        $flash = Flash::findOrFail($id);
        $flash->pictureFile()->delete();


    

        $data = Flash::findOrFail($id);
        $data->delete();



        return redirect('/manager/flashes');
    }

    function updateFlash(Request $req){

        $data = Flash::findOrFail($req->id);
        $data->name = $req->name;
        $data->price = $req->price;
        // $data->active = 0;
        $data->save();

        // dd($req->hasFile('fileImageEdit'));
        if ($req->hasFile('fileImageEdit')){ 
            // Suppression de l'image
            $image = PictureFile::where('flash_id', $req->id)->first();
            $image->delete();

            $filename = $image->filename;
            $path = public_path().'/images/flashes/'.$filename;
            unlink($path);


            $originaleFilename = $req->file('fileImageEdit');
            $name = $originaleFilename->getClientOriginalName();
            $originaleFilename->move(public_path().'/images/flashes/', $name);
            $image = new PictureFile();
            $image->filename = $name;
    
            $image->flash_id = $data->id;
            $image->save();
        }
    
        return redirect('/manager/flashes');
 
    }

    function addFlashPhotos(Request $req){
        $image = $req->file('image');
        $name = $image->getClientOriginalName();
        $image->move(public_path().'/images/', $name);
        $image = new PictureFile();
        $image->filename = $name;
        // $image->flash_id = 4;
        $image->save();  
        return redirect('/manager/flashes');
    }


    // CALENDAR
    function calendar(){

        return view('managerCalendar');
    }
}
