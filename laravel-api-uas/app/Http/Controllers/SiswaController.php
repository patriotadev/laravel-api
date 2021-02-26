<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{

    public function index()
    {
        return Siswa::paginate(3);
    }

    public function create(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->nim = $request->nim;
        $siswa->email = $request->email;
        $siswa->save();

        return response()->json([
            'pesan' => "berhasil ditambahkan",
        ]);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $nim = $request->nim;

        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nim = $request->nim;
        $siswa->email = $request->email;
        $siswa->save();

        return response()->json([
            'pesan' => "berhasil diupdate",
        ]);
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return response()->json([
            'pesan' => "berhasil dihapus",
        ]);
    }
}
