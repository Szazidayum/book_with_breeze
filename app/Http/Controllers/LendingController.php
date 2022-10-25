<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Lending;
use App\Models\User;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index(){
        $lendings =  Lending::all();
        return $lendings;
    }
    
    public function show($id)
    {
        $lendings = Lending::find($id);
        return $lendings;
    }
    public function destroy($id)
    {
        Lending::find($id)->delete();
    }
    public function store(Request $request)
    {
        $lending = new Lending();
        $lending->users_id = $request->users_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save(); 
    }

     public function update(Request $request, $id)
     {
        $lending = Lending::find($id);
        $lending->users_id = $request->users_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();        
     }


    public function newView()
    {
        $users = User::all();
        $copies = Copy::all();
        return view('copy.new', ['users' => $users, 'books' => $copies]);
    }

    
}
