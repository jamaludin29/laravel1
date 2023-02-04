<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\prodi;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Models\user;
use Image;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



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
        $sampah = departemen::onlyTrashed()->count();
        // return view('departemen.departemen', compact('departemen'));
        return view('departemen.departemen', compact('departemen','sampah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi=prodi::all();
        return view('departemen.create',compact('prodi'));
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
            'id_dept' => 'required|unique:departemens',
            'nama_dept' => 'required|max:225',
            'id_prodi' => 'required',
            
        ]);

        $dept = departemen::create([
            'id_dept' => $request->id_dept,
            'nama_dept' => $request->nama_dept,
            'id_prodi' => $request->id_prodi,
            
        ]);

        if ($dept) {
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Data departemen Berhasil Ditambahkan'
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
    public function edit($id)
    {
        $prodi=prodi::all();
        $departemen = departemen::findOrFail($id);
        return view('departemen.edit', compact('departemen','prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_dept' => 'required',
            'nama_dept' => 'required',
            'id_prodi' => 'required',
        ]);

        $dept = departemen::findOrFail($id);

        $dept->update([
            'id_dept' => $request->id_dept,
            'nama_dept' => $request->nama_dept,
            'id_prodi' => $request->id_prodi,
           
        ]);

        if ($dept) {
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Data departemen Berhasil Diubah'
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
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $dept = departemen::findOrFail($id);
        $dept->delete();
        if ($dept) {
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Data departemen Berhasil Dihapus'
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
        $dept = departemen::onlyTrashed()->get();
            return view('departemen.list-sampah', compact('dept'));
    }

    public function restore( $id = null)
    {
        $dept = departemen::onlyTrashed();
        if($dept->count() == 0) {
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $dept->where('id', $id)->restore();
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Data departemen Berhasil Dipulihkan'
                ]);
        } else {
            $dept->restore();
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Data departemen Berhasil Dipulihkan Semua'
                ]);
        }
    }


    public function delete($id = null)
    {
        $dept = departemen::onlyTrashed();
        if($dept->count() == 0) {
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $m = $dept->where('id', $id)->first();
            $m->forceDelete();
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Data departemen Berhasil Dihapus Permanen'
                ]);
        } else {
            $dept->forceDelete();
            return redirect()
                ->route('departemen.index')
                ->with([
                    'success' => 'Data departemen Berhasil Dihapus Permanen Semua'
                ]);
        }
    }

}
