<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = mahasiswa::count();

        return view('dashboard', compact('jumlahMahasiswa'));
    }
}