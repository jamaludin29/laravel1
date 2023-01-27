<?php

namespace App\Http\Controllers;

use App\Models\prodi;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Models\user;
use Image;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;




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
        $prodi=prodi::all();
        return view('mahasiswa.create',compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, mahasiswa $mahasiswa)
    {
        $this->validate($request, [
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required|max:225',
            'alamat' => 'required',
            'id_prodi' => 'required',
            // 'foto' => 'required|mimes:jpg,bmp,png|size:3000',
            'foto' => 'required',
            'jenkel' => 'required',
        ]);

        
        $input = $request->all();
        if ($request->file('foto')) {
            File::delete('img/profile/' . $mahasiswa->foto);
            $file = $request->file('foto');
            // $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            // $file_name = $request->nama. '-' . str_replace(" ", "", $file->getClientOriginalName());
            // $file_name = carbon::today()->format('Y-m-d') . '-' . str_replace(" ", "", $file->getClientOriginalName());
            $extention=$file->extension();
            $file_name = carbon::today()->format('Y-m-d') . '-' . $request->nama . '.' .$extention;
            $destinationPath = public_path('img/profile');
            $fotoFile = Image::make($file->getRealPath());
            $fotoFile->resize(400,400)->save($destinationPath.'/'.$file_name);
            $input['foto']=$file_name;
           
        }
        $mahasiswa = mahasiswa::create($input);

      
           
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
        $prodi=prodi::all();
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa','prodi'));
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
            'id_prodi' => 'required',
            // 'foto' => 'required',
            'jenkel' => 'required',
        ]);
        
        $input = $request->all();
        $mahasiswa = mahasiswa::find($id);
        // dd($mahasiswa->nama);
        if ($request->file('foto')) {
            File::delete('img/profile/' . $mahasiswa->foto);
            $file = $request->file('foto');
            // $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $extention=$file->extension();
            $file_names = carbon::today()->format('Y-m-d') . '-' . $mahasiswa->nama . '.' .$extention;
            $destinationPath = public_path('img/profile');
            $fotoFile = Image::make($file->getRealPath());
            $fotoFile->resize(400,400)->save($destinationPath.'/'.$file_names);
            $input['foto']=$file_names;
           
        }
        

        $mahasiswa->update($input
            // 'nim' => $request->nim,
            // 'nama' => $request->nama,
            // 'alamat' => $request->alamat,
            // 'id_prodi' => $request->id_prodi,
            // 'foto' => $file_name,
            // 'jenkel' => $request->jenkel
        );

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

    public function raw(){
        $result = DB::table('mahasiswas')
         ->selectRaw('count(*) as total_mahasiswa')
         ->get();
        
        //  echo(). '<br>'; // 3
        }

        public function prosesFileUpload(Request $request){
            $request->validate([
             'berkas' => 'required|file|image|max:1000',
             ]);
            
             $path = $request->berkas->store('uploads');
             echo "Proses upload berhasil, file berada di: $path";
             }

}