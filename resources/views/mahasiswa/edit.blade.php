<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Mahasiswa - Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                    name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>

                                <!-- error message untuk title -->
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>

                                <!-- error message untuk title -->
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea
                                    name="alamat" id="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    rows="5"
                                    required>{{ old('alamat', $mahasiswa->alamat) }}
                                </textarea>

                                <!-- error message untuk alamat -->
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_prodi">Prodi</label>
                                {{-- <input type="text" class="form-control @error('id_prodi') is-invalid @enderror"
                                    name="id_prodi" value="{{ old('id_prodi', $mahasiswa->id_prodi) }}" required> --}}

                                    <select class="form-control" data-toggle="select" name="id_prodi" required>
                                        <option value="{{$mahasiswa->id_prodi}}" selected style="align-items: center">{{$mahasiswa->prodis->nama_prodi}}</option>
                                        @foreach ($prodi as $k)
                                            <option value="{{ $k->id_prodi }}">{{ $k->nama_prodi }}</option>
                                        @endforeach
                                    </select>

                                <!-- error message untuk title -->
                                @error('id_prodi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto" value="{{ old('foto', $mahasiswa->foto) }}">

                                    @if ($mahasiswa->foto == null)
                                    <img src="{{ asset('img/mhs/image.jpg')}}" class="img-thumbnail" alt="...">
                                    @else 
                                    <img src="{{ asset('img/mhs/'.$mahasiswa->foto)}}" class="img-thumbnail" alt="...">
                                    @endif
                                <!-- error message untuk title -->
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jenkel">Jenkel</label>
                                <input type="text" class="form-control @error('jenkel') is-invalid @enderror"
                                    name="jenkel" value="{{ old('jenkel', $mahasiswa->jenkel) }}" required>

                                <!-- error message untuk title -->
                                @error('jenkel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ipk">IPK</label>
                                <input type="text" class="form-control @error('ipk') is-invalid @enderror"
                                    name="ipk" value="{{ old('jenkel', $mahasiswa->ipk) }}" required>

                                <!-- error message untuk title -->
                                @error('ipk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Ubah</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
</body>

</html>