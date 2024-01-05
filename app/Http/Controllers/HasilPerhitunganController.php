<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilPerhitungan;

class HasilPerhitunganController extends Controller
{
    public function simpanHasilPerhitungan(Request $request)
    {
        // Pastikan pengguna sudah login sebelum menyimpan hasil perhitungan
        if (Auth::check()) {
            // Ambil data yang dikirimkan dari formulir
            $hasilData = $request->input('hasilData');
            $hasilPerhitungan = $request->input('hasilPerhitungan');
            $totalHarta = $request->input('totalHarta');

            // Simpan data ke dalam database
            HasilPerhitungan::create([
                'hasil_data' => json_encode($hasilData),
                'hasil_perhitungan' => json_encode($hasilPerhitungan),
                'total_harta' => json_encode($totalHarta),
                'user_id' => Auth::id(), // Menggunakan helper Auth untuk mengambil ID pengguna yang sedang login
            ]);

            // Redirect atau berikan respons sesuai kebutuhan
            return redirect()->route('hasil-perhitungan')->with('success', 'Hasil perhitungan berhasil disimpan.');
        } else {
            // Jika pengguna belum login, atur pesan atau arahkan ke halaman login
            return redirect()->route('login')->with('error', 'Anda harus login untuk menyimpan hasil perhitungan.');
        }
    }

    public function tampilkanHasilPerhitungan()
{
    $hasilPerhitungan = HasilPerhitungan::latest()->first(); // Misalnya mengambil data terbaru
    return view('hasil_perhitungan', compact('hasilPerhitungan'));
}
}
