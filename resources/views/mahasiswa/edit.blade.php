<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Mahasiswa</title>

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
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* CARD */
        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(70, 20, 20, 0.12);
        }

        .card h2 {
            margin-top: 0;
            color: #4a1717;
            margin-bottom: 25px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #4a1717;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #c9aaaa;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background: white;
        }

        input:focus,
        textarea:focus {
            border-color: #6b1f1f;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        /* ERROR */
        .error {
            background: #f5dddd;
            color: #8b2e2e;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* BUTTON */
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-update {
            background: #6b1f1f;
            color: white;
        }

        .btn-update:hover {
            background: #521717;
        }

        .btn-kembali {
            background: #e3d3d3;
            color: #4a1717;
        }

        .btn-kembali:hover {
            background: #d5c0c0;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {

            .header {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <h1>Sistem Informasi Mahasiswa</h1>
        <p>Edit Data Mahasiswa</p>
    </div>

    <!-- CONTAINER -->
    <div class="container">

        <div class="card">

            <h2>Form Edit Mahasiswa</h2>

            <!-- ERROR -->
            @if ($errors->any())

                <div class="error">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <!-- FORM -->
            <form
                action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <!-- NIM -->
                <div class="form-group">

                    <label for="nim">
                        NIM
                    </label>

                    <input
                        type="text"
                        id="nim"
                        name="nim"
                        value="{{ old('nim', $mahasiswa->nim) }}"
                        placeholder="Masukkan NIM"
                    >

                </div>

                <!-- NAMA -->
                <div class="form-group">

                    <label for="nama">
                        Nama Mahasiswa
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama', $mahasiswa->nama) }}"
                        placeholder="Masukkan nama mahasiswa"
                    >

                </div>

                <!-- JURUSAN -->
                <div class="form-group">

                    <label for="jurusan">
                        Jurusan
                    </label>

                    <input
                        type="text"
                        id="jurusan"
                        name="jurusan"
                        value="{{ old('jurusan', $mahasiswa->jurusan) }}"
                        placeholder="Masukkan jurusan"
                    >

                </div>

                <!-- SEMESTER -->
                <div class="form-group">

                    <label for="semester">
                        Semester
                    </label>

                    <input
                        type="text"
                        id="semester"
                        name="semester"
                        value="{{ old('semester', $mahasiswa->semester) }}"
                        placeholder="Masukkan semester"
                    >

                </div>

                <!-- ALAMAT -->
                <div class="form-group">

                    <label for="alamat">
                        Alamat
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        placeholder="Masukkan alamat mahasiswa"
                    >{{ old('alamat', $mahasiswa->alamat) }}</textarea>

                </div>

                <!-- BUTTON -->
                <div class="buttons">

                    <button
                        type="submit"
                        class="btn btn-update"
                    >
                        Update Data
                    </button>

                    <a
                        href="{{ route('mahasiswa.index') }}"
                        class="btn btn-kembali"
                    >
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>