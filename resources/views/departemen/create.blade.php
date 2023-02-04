<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" alamat="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" alamat="ie=edge">
    <meta name="csrf-token" alamat="{{ csrf_token() }}">
    <title>Input Departemen - Daftar Departemen</title>
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

                        <form action="{{ route('departemen.store') }}" method="POST">
                            
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_dept">ID Departemen</label>
                                        <input type="text" class="form-control @error('id_dept') is-invalid @enderror"
                                            name="id_dept" value="{{ old('id_dept') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('id_dept')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama_dept">Nama Departemen</label>
                                        <input type="text" class="form-control @error('nama_dept') is-invalid @enderror"
                                            name="nama_dept" value="{{ old('nama_dept') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('nama_dept')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="id_prodi">Prodi</label>
                                                    <select class="form-control" data-toggle="select" name="id_prodi" required>
                                                        <option value="" selected style="align-items: center">Pilih Prodi</option>
                                                        @foreach ($prodi as $k)
                                                            <option value="{{ $k->id_prodi }}">{{ $k->nama_prodi }}</option>
                                                        @endforeach
                                                    </select>

                                            
                                                @error('id_prodi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                <div class="row">
                                </div>
                            </div>                            
                    
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('departemen.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                
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