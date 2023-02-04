<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" alamat="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" alamat="ie=edge">
    <meta name="csrf-token" alamat="{{ csrf_token() }}">
    <title>Input dosen - Daftar dosen</title>
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

                        <form action="{{ route('dosen.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                            name="nip" value="{{ old('nip') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('nip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea
                                    name="alamat" id="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    rows="5"
                                    required>{{ old('alamat') }}
                                </textarea>

                                <!-- error message untuk alamat -->
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <label for="departemen">departemen</label>
                                        <input type="text" class="form-control @error('departemen') is-invalid @enderror"
                                            name="departemen" value="{{ old('departemen') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('departemen')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_dept">departemen</label>
                                            <select class="form-control" data-toggle="select" name="id_dept" required>
                                                <option value="" selected style="align-items: center">Pilih Departemen</option>
                                                @foreach ($dept as $k)
                                                    <option value="{{ $k->id_dept }}">{{ $k->nama_dept }}</option>
                                                @endforeach
                                            </select>

                                    
                                        @error('id_dept')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact">Kontak</label>
                                        <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                            name="contact" value="{{ old('contact') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            

                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('dosen.index') }}" class="btn btn-md btn-secondary">Kembali</a>

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
            $('#alamat').summernote({
                height: 150, //set editable area's height
            });
        })
    </script>
</body>

</html>