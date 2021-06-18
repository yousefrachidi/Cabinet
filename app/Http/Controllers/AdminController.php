<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{ 
    public function edit(){
        $admin = Admin::find((session('admin')->id));
        return view('admin.edit')->with([
            'admin' => $admin
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'image_file' => 'image|mimes:jpeg,png,jpg|max:2048',
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'email' => 'required|email',
        ]);
        $admin = Admin::find($id);
        
        $admin->nom = $request->input('nom');
        $admin->prenom = $request->input('prenom');
        $admin->email = $request->input('email');

        if($request->pass){
            $admin->mot_de_pass = bcrypt(request('pass'));
        }

        if($request->hasFile('image_file')){
            $file = $request->file('image_file');
            $filename = 'boss.jpg';
            $file->move(public_path('images'), $filename);
        }

        $admin->save();

        return redirect()->back()->with([
            'message_success' => 'vos données ont été modifiées avec succès.'
        ]);
    }

}
