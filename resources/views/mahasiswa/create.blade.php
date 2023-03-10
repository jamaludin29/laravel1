<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" alamat="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" alamat="ie=edge">
    <meta name="csrf-token" alamat="{{ csrf_token() }}">
    <title>Input Mahasiswa - Daftar Mahasiswa</title>
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

                            <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                            name="nim" value="{{ old('nim') }}" required>
        
                                        <!-- error message untuk title -->
                                        @error('nim')
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_prodi">Prodi</label>
                                        {{-- <input type="text" class="form-control @error('id_prodi') is-invalid @enderror"
                                            name="id_prodi" value="{{ old('id_prodi') }}" required> --}}
        
                                            <select class="form-control" data-toggle="select" name="id_prodi" required>
                                                <option value="" selected style="align-items: center">Pilih Prodi</option>
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
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="foto">FOTO</label>
                                        {{-- sandika img class--}}
                                        <img class="img-preview img-fluid mb-3 col-sm-6">
                                        {{-- <img class="img-preview"> --}}
                                        
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                            name="foto" id="foto" onchange="previewImage()" value="{{ old('foto') }}" required>
        
                                        {{-- sandika js img tambahkan onchange --}}

                                        <!-- error message untuk title -->
                                        @error('foto')
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
                                            <label for="jenkel">Jenis Kelamin</label>
                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="L">
                                                <label class="form-check-label" for="jenkel">
                                                  Laki laki
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenkel" id="jenkel" value="P">
                                                <label class="form-check-label" for="jenkel">
                                                  Perempuan
                                                </label>
                                              </div>
            
                                            <!-- error message untuk title -->
                                            @error('jenkel')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                        
                            
                             {{-- <div class="row> --}}
                                <div class="form-group">
                                    <label for="ipk">IPK</label>
                                    <input type="number" step="0.01" max="4" class="form-control @error('ipk') is-invalid @enderror"
                                        name="ipk" value="{{ old('ipk') }}" required>

                                    <!-- error message untuk title -->
                                    @error('ipk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        </div><br>
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

    <script>

        function previewImage() {
            const foto = document.querySelector('#foto');
            const imgpreview = document.querySelector('.img-preview');

            imgpreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent){
                imgpreview.src = oFREvent.target.result;
            }
        }

    </script>
</body>

</html>