<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

    function booking(){

        return view('userBooking');
    }
    
    public function calendarBookings(Request $request)
    {
        $eventList = Booking::get(['event_name','event_start']);
        return response()->json(["My events" => $eventList]);
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
        return redirect('/home');
    }
}
