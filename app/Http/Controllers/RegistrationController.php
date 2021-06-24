<?php

namespace App\Http\Controllers;

use App\Children;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index() 
    {
        return view('registration/registration');
    }

    public function store(Request $request) 
    {
        $random = $this->generateRandomString(3) . $this->generateRandomDigit(2);

        //Check si le code crée est en db
        while (count(Children::where('code', $random)->get()) != 0) {
            $random = $this->generateRandomString(3) . $this->generateRandomDigit(2);
        }

        $children = new Children();

        $children->first = request('first');
        $children->last = request('last');
        $children->birth = request('birth');
        $children->arrival = request('arrival');
        $children->departure = request('departure');
        $children->code = $random;
        $children->save();

        //trouver une meilleure façon de le faire
        return redirect('/')->withErrors(['Votre identifiant enfant est : '.$random]);
    }

    private function generateRandomDigit($length) 
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function generateRandomString($length) 
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }    
        
}
