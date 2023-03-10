{{-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12"> --}}

                {{-- @include('layout.main',['title' => 'Data Mahasiswa']) --}}
                @extends('layouts.main',['title' => 'Data Mahasiswa'])
                
                @section('data')
                


                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success col-lg-8">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error col-lg-8">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-success mb-3 float-right">Input Mahasiswa</a>
                        @canany('update', $user)
                        @if($sampah > 0)
                        <a href="{{ route('list.sampahM') }}" class="btn btn-md btn-warning mb-3 float-left">Recycle Mahasiswa</a>
                        @endif
                        @endcanany
                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Jenkel</th>
                                    <th scope="col">IPK</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->nim }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->alamat }}</td>
                                    {{-- <td>{{ $m->id_prodi }}</td> --}}
                                    <td>{{ $m->prodis->nama_prodi}}</td>
                                    {{-- <td><img src="{{ asset('img/profile/'.$m->foto)}}" class="img-thumbnail" alt="..."></td> --}}
                                    <td>{{ $m->foto }}</td>
                                    <td>{{ $m->jenkel }}</td>
                                    
                                    <td>
                                      @if ($m->ipk >= 3 && $m->ipk < 4)
                                        <span class="badge badge-success" style="width: 50px">{{ $m->ipk }}</span>
                                      @elseif($m->ipk < 3)
                                        <span class="badge badge-danger" style="width: 50px">{{ $m->ipk }}</span>
                                      @elseif($m->ipk == 4)
                                      <span class="badge badge-primary" style="width: 50px">{{ $m->ipk }}</span>
                                      @endif
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <form class="d-inline" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST">
                                                                                        
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data mahasiswa tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            {{-- </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html> --}}
@endsection