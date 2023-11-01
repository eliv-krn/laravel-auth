<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('admin.home');
        } else if (Auth::user()->role == 'petugas') {
            return view('petugas.home');
        } else {
            return view('masyarakat.home');
        }
    }

    public function admin()
    {
        return view('admin.home');
    }

    public function petugas()
    {
        return view('petugas.home');
    }

    public function masyarakat()
    {
        return view('masyarakat.home');
    }
}
