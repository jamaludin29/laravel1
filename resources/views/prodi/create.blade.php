<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" alamat="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" alamat="ie=edge">
    <meta name="csrf-token" alamat="{{ csrf_token() }}">
    <title>Input Prodi - Daftar Prodi</title>
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

                        <form action="{{ route('prodi.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_prodi">ID Prodi</label>
                                        <input type="text" class="form-control @error('id_prodi') is-invalid @enderror"
                                            name="id_prodi" value="{{ old('id_prodi') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('id_prodi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama_prodi">Nama Prodi</label>
                                        <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror"
                                            name="nama_prodi" value="{{ old('nama_prodi') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('nama_prodi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                             
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('prodi.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                                {{-- </div> --}}
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