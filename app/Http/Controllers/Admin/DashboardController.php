<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalbuku' => Buku::count(),
            'bukutersedia' => Buku::where('stok', '>', 0)->count(),
            'bukuhabis' => Buku::where('stok', 0)->count(),
            'totalkategori' => Kategori::count(),
        ]);
    }
}
