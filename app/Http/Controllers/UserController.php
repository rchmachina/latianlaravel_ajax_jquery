<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller

{    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $hobis = DB::table('hobi')->get();


        return view('welcome')
        ->with(['hobi' => $hobis])
        ->with(['users' => $users]);
    }


    public function delete($id){
        User::where('id', $id)->delete();

	
	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request){
        
        $pass = Hash::make($request->password);

        // }

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $pass,
            'username' => $request->username,
            'hobi' => implode(' , ', $request->hobi),
            'Kelamin' => $request->kelamin,
            'no_hp' => $request->phone,
        ]);
        return redirect('/');
    }
}
