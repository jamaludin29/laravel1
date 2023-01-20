<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Models\user;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = mahasiswa::latest()->get();
        $sampah = mahasiswa::onlyTrashed()->count();
       
        // $user = user::all();
        // dd($user); untuk cek apakah datanya ada sebelum menjalan view 
        
        return view('mahasiswa.mahasiswa', compact('mahasiswa','sampah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
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
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'contact' => 'required',
            'ipk' => 'required',
        ]);

        $mahasiswa = mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
            'contact' => $request->contact,
            'ipk' => $request->ipk
        ]);

        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data Mahasiswa Berhasil Ditambahkan'
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
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'contact' => 'required',
            'ipk' => 'required',
        ]);

        $mahasiswa = mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
            'contact' => $request->contact,
            'ipk' => $request->ipk
        ]);

        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data Mahasiswa Berhasil Diubah'
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
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data Mahasiswa Berhasil Dihapus'
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
        $mahasiswa = mahasiswa::onlyTrashed()->get();
            return view('mahasiswa.list-sampah', compact(
                'mahasiswa'
            ));
    }

    public function restore( $id = null)
    {
        $mahasiswa = mahasiswa::onlyTrashed();
        if($mahasiswa->count() == 0) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $mahasiswa->where('id', $id)->restore();
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data Mahasiswa Berhasil Dipulihkan'
                ]);
        } else {
            $mahasiswa->restore();
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data Mahasiswa Berhasil Dipulihkan Semua'
                ]);
        }
    }

    public function delete($id = null)
    {
        $mahasiswa = mahasiswa::onlyTrashed();
        if($mahasiswa->count() == 0) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Sampah Kosong'
                ]);
        }

        if ($id != null) {
            $m = $mahasiswa->where('id', $id)->first();
            $m->forceDelete();
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data Mahasiswa Berhasil Dihapus Permanen'
                ]);
        } else {
            $mahasiswa->forceDelete();
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'Data Mahasiswa Berhasil Dihapus Permanen Semua'
                ]);
        }
    }
}