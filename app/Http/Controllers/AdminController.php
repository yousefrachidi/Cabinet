<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{ 
    public function edit($id){
        $admin = Admin::find($id);
        return view('admin.edit')->with([
            'admin' => $admin
        ]);
    }

    public function update(Request $request, $id){
        $admin = Admin::find($id);
        
        $admin->nom = $request->input('nom');
        $admin->prenom = $request->input('prenom');
        $admin->email = $request->input('email');

        if($request->pass){
            $admin->mot_de_pass = bcrypt(request('pass'));
        }

        if($request->hasFile('image_file')){
            echo "<script> alert('this is') </script>";
            //dd($request->all());
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
