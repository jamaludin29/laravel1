<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
       
        $dosen = dosen::latest()->get();
        $sampah = dosen::onlyTrashed()->count();
        return view('dosen', compact('dosen','sampah'));
        
    }
}
