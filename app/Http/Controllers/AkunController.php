<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AkunController extends Controller
{
    public function index()
    {
        $post = User::all();
        return view('admin.akun.index', compact('post'));
    }

    public function create()
    {
        $role = ['admin', 'petugas', 'masyarakat'];
        return view('admin.akun.create', compact('role'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'    => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        //create post
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => $request->role
        ]);

        //redirect to index
        return redirect()->route('akun.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
