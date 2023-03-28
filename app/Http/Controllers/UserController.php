<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function all_user(){
        $user = User::orderBy('id','DESC')->get();
        return response()->json($user);
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return response()->json($user);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $user = User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return response()->json($user);
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json($user);
    }
}
