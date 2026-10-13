<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    private function dataMahasiswa(): array
    {
        return [
            ['nama' => 'Andi Pratama', 'nim' => '2201001', 'ipk' => 3.80],
            ['nama' => 'Budi Santoso', 'nim' => '2201002', 'ipk' => 3.25],
            ['nama' => 'Citra Dewi',   'nim' => '2201003', 'ipk' => 3.55],
            ['nama' => 'Dimas Putra',  'nim' => '2201004', 'ipk' => 2.75],
            ['nama' => 'Eka Lestari',  'nim' => '2201005', 'ipk' => 1.85],
        ];
    }

    // Latihan a
    public function profil()
    {
        $nama  = 'Yokie Aditya Warman';
        $nim   = '242520136';
        $prodi = 'Teknologi Informasi';

        return view('mahasiswa.profil', compact('nama', 'nim', 'prodi'));
    }

    // Latihan b + d
    public function daftar()
    {
        $mahasiswa = $this->dataMahasiswa();
        $adaIpkRendah = collect($mahasiswa)->contains(fn ($m) => $m['ipk'] < 2.0);

        return view('mahasiswa.daftar', compact('mahasiswa', 'adaIpkRendah'));
    }

    // Latihan c
    public function detail($nim)
    {
        $mhs = collect($this->dataMahasiswa())->firstWhere('nim', $nim);
        abort_if(!$mhs, 404);

        return view('mahasiswa.detail', ['mhs' => $mhs]);
    }
}