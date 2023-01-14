<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Daftar Mahasiswa</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/
    4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-4">
        <h1>Daftar Mahasiswa</h1>
        {{-- <ol class="list-group my-4">
            @foreach ($mahasiswa as $m)
            <li class="list-group-item">{{ $m->nama}} </li>
            @endforeach
        </ol> --}}

        <a href="{{ route('mahasiswa.create') }}" type="button" class="btn btn-primary">Add</a>

        <table class="table table-striped" style="margin-top: 20px">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Contact</th>
                <th scope="col">IPK</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $m)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $m->nim }}</td>
                  <td>{{ $m->nama }}</td>
                  <td>{{ $m->alamat }}</td>
                  <td>{{ $m->jurusan }}</td>
                  <td>{{ $m->contact }}</td>
                  <td>{{ $m->ipk }}</td>
                  <td><a href="{{ route('mahasiswa.edit',$m->id) }}" type="button" class="btn btn-primary">Edit</a> &nbsp;
                    <a href="{{ route('mahasiswa.destroy',$m->id) }}" type="button" class="btn btn-primary">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
    <div>
    {{-- <img class="rounded-circle img-thumbnail m-2" src="/img/people1.jpg">
    <img class="rounded-circle img-thumbnail m-2" src="/img/people2.jpg">
    <img class="rounded-circle img-thumbnail m-2" src="/img/people3.jpg">
    <img class="rounded-circle img-thumbnail m-2" src="/img/people4.jpg"> --}}
    </div>
    <div style="margin-top: 40px">
        Copyright © <?php echo date("Y"); ?> Duniailkom
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/
    popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/
    bootstrap.min.js"></script>
</body>
</html>