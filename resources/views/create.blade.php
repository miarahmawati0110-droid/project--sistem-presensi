<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h1>Tambah Data Mahasiswa</h1>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <label>NIM</label><br>
        <input type="text" name="nim"><br><br>

        <label>Nama</label><br>
        <input type="text" name="nama"><br><br>

        <label>Jurusan</label><br>
        <input type="text" name="jurusan"><br><br>

        <label>Semester</label><br>
        <input type="text" name="semester"><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>

    <a href="{{ route('mahasiswa.index') }}">Kembali</a>

</body>
</html>