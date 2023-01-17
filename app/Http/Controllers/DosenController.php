<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = dosen::latest()->get();
        $sampah = dosen::onlyTrashed()->count();
        return view('dosen.dosen', compact('dosen','sampah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dosen $dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $dosen = dosen::findOrFail($id);
        $dosen->delete();
        if ($dosen) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data Dosen Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi Kesalahan, Tolong Periksa'
                ]);
        }
    }

    public function listsampah()
    {
        $dosen = dosen::onlyTrashed()->get();
            return view('dosen.list-sampah', compact(
                'dosen'
            ));
    }
}
