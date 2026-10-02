<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    // Menampilkan data mahasiswa
    public function index(Request $request)
    {
        $search = $request->search;

        $mahasiswa = mahasiswa::query()
            ->when($search, function ($query, $search) {
                $query->where('nim', 'like', "%{$search}%")
                      ->orWhere('nama', 'like', "%{$search}%")
                      ->orWhere('jurusan', 'like', "%{$search}%");
            })
            ->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Halaman tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            'alamat' => 'nullable',
        ]);

        mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    // Halaman edit mahasiswa
    public function edit($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Memperbarui data mahasiswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            'alamat' => 'nullable',
        ]);

        $mahasiswa = mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    // Menghapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}