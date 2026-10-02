<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa - Mahogany</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f5eeee;
        }

        /* HEADER */
        .header {
            background: #6b1f1f;
            color: white;
            padding: 20px 40px;
        }

        .header h1 {
            margin: 0;
            font-size: 25px;
        }

        .header p {
            margin: 5px 0 0;
            opacity: 0.9;
        }

        /* CONTAINER */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* BAGIAN ATAS */
        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top h2 {
            margin: 0;
            color: #4a1717;
        }

        /* TOMBOL TAMBAH */
        .btn-tambah {
            background: #6b1f1f;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-tambah:hover {
            background: #521717;
        }

        /* PESAN SUKSES */
        .success {
            background: #ead6d6;
            color: #5a1a1a;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 5px solid #6b1f1f;
        }

        /* FORM PENCARIAN */
        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-form input {
            flex: 1;
            padding: 11px 14px;
            border: 1px solid #c9aaaa;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background: white;
        }

        .search-form input:focus {
            border-color: #6b1f1f;
        }

        .search-form button {
            background: #6b1f1f;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .search-form button:hover {
            background: #521717;
        }

        .search-form a {
            background: #e3d3d3;
            color: #4a1717;
            padding: 11px 16px;
            border-radius: 8px;
            text-decoration: none;
        }

        .search-form a:hover {
            background: #d5c0c0;
        }

        /* CARD */
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(70, 20, 20, 0.12);
            overflow-x: auto;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #6b1f1f;
            color: white;
            padding: 13px;
            text-align: left;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #eadede;
            color: #333;
        }

        tr:hover {
            background: #faf3f3;
        }

        /* TOMBOL EDIT */
        .btn-edit {
            background: #a45a3a;
            color: white;
            padding: 7px 12px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
        }

        .btn-edit:hover {
            background: #86482f;
        }

        /* TOMBOL HAPUS */
        .btn-hapus {
            background: #8b2e2e;
            color: white;
            padding: 7px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        .btn-hapus:hover {
            background: #6f2222;
        }

        /* AKSI */
        .aksi {
            display: flex;
            gap: 7px;
        }

        /* DATA KOSONG */
        .kosong {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {

            .top {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form input,
            .search-form button,
            .search-form a {
                width: 100%;
            }

            table {
                min-width: 800px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <h1>Sistem Informasi Mahasiswa</h1>
        <p>Data Mahasiswa</p>
    </div>

    <!-- CONTAINER -->
    <div class="container">

        <!-- PESAN SUKSES -->
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- JUDUL DAN TOMBOL TAMBAH -->
        <div class="top">

            <h2>Daftar Mahasiswa</h2>

            <a href="{{ route('mahasiswa.create') }}" class="btn-tambah">
                + Tambah Mahasiswa
            </a>

        </div>

        <!-- FORM PENCARIAN -->
        <form
            action="{{ route('mahasiswa.index') }}"
            method="GET"
            class="search-form"
        >

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari NIM, nama, atau jurusan..."
            >

            <button type="submit">
                Cari
            </button>

            @if(request('search'))
                <a href="{{ route('mahasiswa.index') }}">
                    Reset
                </a>
            @endif

        </form>

        <!-- CARD TABLE -->
        <div class="card">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Semester</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($mahasiswa as $data)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $data->nim }}
                            </td>

                            <td>
                                {{ $data->nama }}
                            </td>

                            <td>
                                {{ $data->jurusan }}
                            </td>

                            <td>
                                {{ $data->semester }}
                            </td>

                            <td>
                                {{ $data->alamat }}
                            </td>

                            <td>

                                <div class="aksi">

                                    <!-- EDIT -->
                                    <a
                                        href="{{ route('mahasiswa.edit', $data->id) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('mahasiswa.destroy', $data->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-hapus"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="kosong">

                                @if(request('search'))

                                    Data mahasiswa dengan kata
                                    "<strong>{{ request('search') }}</strong>"
                                    tidak ditemukan.

                                @else

                                    Belum ada data mahasiswa.

                                @endif

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>
</html>