<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\CustomerMail;
use App\Models\Flash;
use App\Models\Order;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{
    /**
     * Affiche le formulaire de reservation
     */
    public function index(Request $request) {

        //CONFIG
        $userId = Auth::id();
        if ($userId == NULL) {return redirect()->route('login'); }

        // TRAITEMENT
            // Je retourne les informations sur le flash
            $flash = Flash::with('tattooist')->where('active', 1)->findorfail($request->id);

            // Je recupère toutes dates bookés pour le tatoueur dans un tableau
            $id_tattooist = $flash->tattooist->id;
            $booking_dates = Booking::where('tattooist_id', $id_tattooist)->get();

            $items = array();
                foreach($booking_dates as $date) {
                $items[] = $date->datetime;
            }

        // VUE
        return view('booking', [
            // 'tatoueur' => $tatoueur,
            'flash' => $flash,
            'dates_array' => $items
        ]);
    }

    /**
     * Traitement formulaire de reservation
     */
    public function post(Request $request) {
        // CONFIG
        $userId = Auth::id();

        $user = User::find($userId);

        // TRAITEMENT
            // New order
            try {
                $order = new Order;
                $order->first_tattoo = $request->firstTattoo;
                $order->optional_message = $request->optionalMessage;
                $order->flash_id = $request->id;
                $order->save();
            }
            catch(Exception $e) {
                if (!($e instanceof SQLException)) {
                    app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
                }
            }

            // Get les flash
            $flash = Flash::find($request->id);
            // On passe active à 0 pour masquer le flash de la page d'accueil
            $flash->active = 0;
            $flash->save();

            // New booking
            try {
                $booking = new Booking;
                $booking->datetime = $request->date;
                $booking->customer_id = $userId;
                $booking->tattooist_id = $flash->tattooist->id;
                $booking->flash_id = $flash->id;
                $booking->save();
            }
            catch(Exception $e) {
                if (!($e instanceof SQLException)) {
                    app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
                }
            }

            // Récupère la reservation
            $booking = Booking::latest()->first();

            // Envoie mail au tatoueur
            Mail::to($flash->tattooist->email)->send(new TestMail($flash, $user, $booking));

            // Envoie mail au customer
            Mail::to($user->email)->send(new CustomerMail());

            $request->session()->flash('success', 'Booking was successful!');

        // VUE
        return redirect()->route('main');
    }
}
