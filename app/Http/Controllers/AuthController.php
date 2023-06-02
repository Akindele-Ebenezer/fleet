<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function Auth() { 
        $Email = request()->Email;
        $Password = request()->Password;
 
        $Validated = request()->validate([
            'Email' => 'email',
            'Password' => 'required',
        ]);

        $Query = User::where('email', $Email)
                        ->where('password', $Password)
                        ->get();


        if(count($Query) == 1) {
            foreach ($Query as $User) {
                request()->session()->put('Id', $User->id);
                request()->session()->put('Email', $User->email);
                request()->session()->put('Name', $User->name);
                request()->session()->put('Role', $User->role);

                User::where('id', $User->id)
                ->update([ 
                    'status' => 'ONLINE',
                ]);
            }
            
            return redirect('Cars');
        } else {
            $Error = 'Your credentials are Invalid'; 
            return redirect('/')->with('Error', $Error);
        }                   
    }

    public function Logout() {
        User::where('id', request()->session()->get('Id'))
        ->update([ 
            'status' => 'OFFLINE',
        ]);

        request()->session()->flush();

        return redirect('/');
    }
}
