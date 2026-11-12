<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
class BukuSeeder extends Seeder
{
   public function run(): void
    {
        $data = [
            ['Fiksi',      'Laskar Pelangi',                 'Andrea Hirata',        'Bentang Pustaka',     2005, 10],
            ['Fiksi',      'Bumi Manusia',                   'Pramoedya Ananta Toer', 'Hasta Mitra',         1980, 8],
            ['Teknologi',  'Belajar Laravel untuk Pemula',   'Budi Raharjo',         'Informatika',         2022, 15],
            ['Teknologi',  'Dasar-Dasar Jaringan Komputer',  'Rizki Hikmawan',       'Andi Offset',         2021, 12],
            ['Pendidikan', 'Strategi Belajar Mengajar',      'Syaiful Bahri',        'Rineka Cipta',        2019, 6],
            ['Sains',      'Sejarah Singkat Waktu',          'Stephen Hawking',      'Gramedia',            2018, 5],
            ['Sejarah',    'Sejarah Indonesia Modern',       'M.C. Ricklefs',        'Serambi',             2008, 7],
            ['Biografi',   'Habibie dan Ainun',              'B.J. Habibie',         'THC Mandiri',         2010, 9],
        ];

        foreach ($data as [$kategori, $judul, $penulis, $penerbit, $tahun, $stok]) {
            $kategoriId = Kategori::where('nama_kategori', $kategori)->value('id');

            if (!$kategoriId) {
                continue;
            }

            Buku::firstOrCreate(
                ['judul' => $judul],
                [
                    'kategori_id'  => $kategoriId,
                    'penulis'      => $penulis,
                    'penerbit'     => $penerbit,
                    'tahun_terbit' => $tahun,
                    'stok'         => $stok,
                    'cover'        => null,
                ]
            );
        }
    }
}