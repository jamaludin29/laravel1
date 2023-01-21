<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departemen = departemen::latest()->get();
        // $sampah = departemen::onlyTrashed()->count();
        return view('departemen.departemen', compact('departemen'));
        // return view('departemen.departemen', compact('departemen','sampah'));
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
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show(departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit(departemen $departemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departemen $departemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(departemen $departemen)
    {
        //
    }
}
