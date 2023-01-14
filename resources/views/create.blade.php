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
        <div class="row">
            <div class="col-8">
                <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIM</label>
                        <input type="text" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jurursan</label>
                        <input type="text" name="jurusan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact</label>
                        <input type="number" name="contact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">IPK</label>
                        <input type="number" name="ipk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    <div style="margin-top: 40px">
        Copyright ©2023 -  <?php echo date("Y"); ?> Duniailkom
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/
    popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/
    bootstrap.min.js"></script>
</body>
</html>