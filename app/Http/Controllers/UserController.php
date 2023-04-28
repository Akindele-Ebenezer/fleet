<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function config() {
        $Users = User::orderBy('id')->paginate(14); 
 
        return [
            'Users' => $Users,
        ];
    }
 
    public function index()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Users = User::where('name', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('email', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('role', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);
 
                        $Users->withPath($_SERVER['REQUEST_URI']);

            return view('Users', $Config)->with('Users', $Users);
        } 

        return view('Users', $Config);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        User::insert([ 
            'name' => $request->Name,
            'email' => $request->Email_USER, 
            'role' => $request->Role, 
            'password' => $request->Password,  
        ]);

        return back(); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {      
        User::where('id', $request->UserId)
            ->update([
                'name' => $request->Name,
                'email' => $request->Email_USER, 
                'role' => $request->Role, 
                'password' => $request->Password,
            ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DeleteUser = User::where('id', $id)->delete();

        return back();
    }
}
