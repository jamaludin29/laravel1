<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\prodi;
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
        $dept=departemen::all();
        return view('dosen.create',compact('dept'));
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
            'nip' => 'required|unique:dosens',
            'nama' => 'required',
            'alamat' => 'required',
            'id_dept' => 'required',
            'contact' => 'required'
        ]);

        $dosen = dosen::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'id_dept' => $request->id_dept,
            'contact' => $request->contact
        ]);

        if ($dosen) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data dosen Berhasil Ditambahkan'
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
    public function edit($id)
    {
        $dept=departemen::all();
        $dosen = dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen','dept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'id_dept' => 'required',
            'contact' => 'required'
        ]);

        $dosen = dosen::findOrFail($id);

        $dosen->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'id_dept' => $request->id_dept,
            'contact' => $request->contact
        ]);

        if ($dosen) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data dosen Berhasil Diubah'
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

    public function restore( $id = null)
    {
        $dosen = dosen::onlyTrashed();
        if($dosen->count() == 0) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $dosen->where('id', $id)->restore();
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data dosen Berhasil Dipulihkan'
                ]);
        } else {
            $dosen->restore();
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data dosen Berhasil Dipulihkan Semua'
                ]);
        }
    }

    public function delete($id = null)
    {
        $dosen = dosen::onlyTrashed();
        if($dosen->count() == 0) {
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $m = $dosen->where('id', $id)->first();
            $m->forceDelete();
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data dosen Berhasil Dihapus Permanen'
                ]);
        } else {
            $dosen->forceDelete();
            return redirect()
                ->route('dosen.index')
                ->with([
                    'success' => 'Data dosen Berhasil Dihapus Permanen Semua'
                ]);
        }
    }

}
