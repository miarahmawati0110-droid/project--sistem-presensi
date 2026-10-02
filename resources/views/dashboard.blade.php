<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Presensi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5eeee;
            color: #333;
        }

        .navbar {
            background: #6b1f1f;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .logout {
            background: white;
            color: #6b1f1f;
            text-decoration: none;
            padding: 9px 18px;
            border-radius: 7px;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            color: #6b1f1f;
            margin-bottom: 8px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-left: 6px solid #6b1f1f;
        }

        .card h3 {
            color: #777;
            font-size: 16px;
            margin-bottom: 12px;
        }

        .number {
            color: #6b1f1f;
            font-size: 30px;
            font-weight: bold;
        }

        .menu {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .menu h2 {
            color: #6b1f1f;
            margin-bottom: 20px;
        }

        .menu-list {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .menu-button {
            text-decoration: none;
            background: #6b1f1f;
            color: white;
            padding: 13px 20px;
            border-radius: 7px;
            font-weight: bold;
        }

        .menu-button:hover {
            background: #521717;
        }

        .secondary {
            background: #a45a3a;
        }

        @media (max-width: 700px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>📚 Sistem Presensi Mahasiswa</h2>

        <a href="{{ route('logout') }}" class="logout">
            Logout
        </a>
    </div>

    <div class="container">

        <div class="welcome">
            <h1>Dashboard</h1>

            <p>
                Selamat datang,
                <strong>{{ session('username') }}</strong> 👋
            </p>
        </div>

        <div class="cards">

            <div class="card">
                <h3>Jumlah Mahasiswa</h3>

                <div class="number">
                    {{ $jumlahMahasiswa }}
                </div>
            </div>

            <div class="card">
                <h3>Status Sistem</h3>

                <div class="number">
                    Aktif
                </div>
            </div>

            <div class="card">
                <h3>Login Sebagai</h3>

                <div class="number">
                    {{ session('username') }}
                </div>
            </div>

        </div>

        <div class="menu">

            <h2>Menu Sistem</h2>

            <div class="menu-list">

                <a href="{{ route('mahasiswa.index') }}"
                   class="menu-button">
                    📋 Data Mahasiswa
                </a>

                <a href="{{ route('mahasiswa.create') }}"
                   class="menu-button secondary">
                    ➕ Tambah Mahasiswa
                </a>

            </div>

        </div>

    </div>

</body>
</html>