<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function Auth() { 
        $Email = request()->Email;
        $Password = request()->Password;
 
        $Query = User::where('email', $Email)
                        ->where('password', $Password)
                        ->get();


        if(count($Query) === 1) {
            foreach ($Query as $User) {
                request()->session()->put('Id', $User->id);
                request()->session()->put('Email', $User->email);
                request()->session()->put('Name', $User->name);
            }
            
            return redirect('Cars');
        } else {
            return redirect('/');
        }                   
    }

    public function Logout() {
        request()->session()->flush();
        return redirect('/');
    }
}
