<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AkunController extends Controller
{
    public function index()
    {
        $post = User::latest()->paginate(5);

        return view('admin.akun.index', compact('post'));
    }

    public function create()
    {
        return view('admin.akun.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:50',
            'email'    => 'required|min:50',
            'password' => 'required|min:5',
        ]);

        //create post
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => $request->role,
        ]);

        //redirect to index
        return redirect()->route('akun.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
