<?php

namespace App\Http\Controllers;

use App\Models\prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = prodi::latest()->get();
        // dd($prodi);
        $sampah = prodi::onlyTrashed()->count();
       
        // $user = user::all();
        // dd($user); untuk cek apakah datanya ada sebelum menjalan view 
        
        return view('prodi.prodi', compact('prodi','sampah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_prodi' => 'required|unique:prodis',
            'nama_prodi' => 'required|max:225',
            
        ]);

        $prodi = prodi::create([
            'id_prodi' => $request->id_prodi,
            'nama_prodi' => $request->nama_prodi,
            
        ]);

        if ($prodi) {
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Data Prodi Berhasil Ditambahkan'
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = prodi::findOrFail($id);
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'id_prodi' => 'required',
            'nama_prodi' => 'required',
           
        ]);

        $prodi = prodi::findOrFail($id);

        $prodi->update([
            'id_prodi' => $request->id_prodi,
            'nama_prodi' => $request->nama_prodi,
           
        ]);

        if ($prodi) {
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Data prodi Berhasil Diubah'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = prodi::findOrFail($id);
        $prodi->delete();
        if ($prodi) {
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Data prodi Berhasil Dihapus'
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
        $prodi = prodi::onlyTrashed()->get();
            return view('prodi.list-sampah', compact(
                'prodi'
            ));
    }

    public function restore( $id = null)
    {
        $prodi = prodi::onlyTrashed();
        if($prodi->count() == 0) {
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $prodi->where('id', $id)->restore();
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Data prodi Berhasil Dipulihkan'
                ]);
        } else {
            $prodi->restore();
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Data prodi Berhasil Dipulihkan Semua'
                ]);
        }
    }

    public function delete($id = null)
    {
        $prodi = prodi::onlyTrashed();
        if($prodi->count() == 0) {
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $m = $prodi->where('id', $id)->first();
            $m->forceDelete();
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Data prodi Berhasil Dihapus Permanen'
                ]);
        } else {
            $prodi->forceDelete();
            return redirect()
                ->route('prodi.index')
                ->with([
                    'success' => 'Data prodi Berhasil Dihapus Permanen Semua'
                ]);
        }
    }
}
