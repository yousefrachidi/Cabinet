<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function edit()
    {
        $admin = Admin::find((session('admin')->id));
        return view('admin.edit')->with([
            'admin' => $admin
        ]);
    }

    public function update(Request $request, $id)
    {
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

        if ($request->pass) {
            $admin->mot_de_pass = bcrypt(request('pass'));
        }

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'boss.jpg';
            $file->move(public_path('images'), $filename);
        }

        $admin->save();

        return redirect()->back()->with([
            'message_success' => 'vos données ont été modifiées avec succès.'
        ]);
    }

    function logout()
    {
        if (session()->has('admin')) {
            session()->pull('admin');
        }
        if (session()->has('reception')) {
            session()->pull('reception');
        }
        return redirect('/login');
    }

    function dashboard()
    {
        $countPatient = DB::select('select count(*) as total from patients');
        $countrendezvous = DB::select('select count(*) as total from rendez_vous');
        $countReception = DB::select('select count(*) as total from receptions');


        return view('admin/dashboard', [
            'countPatient' => $countPatient[0]->total,
            'countReception' => $countReception[0]->total,
            'countRendezVous' => $countrendezvous[0]->total
        ]);
    }
}
