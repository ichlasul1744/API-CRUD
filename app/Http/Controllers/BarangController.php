<?php

// app/Http/Controllers/BarangController.php

namespace App\Http\Controllers;

use App\Services\BarangService;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    private $barangService;

    public function __construct(BarangService $barangService)
    {
        $this->barangService = $barangService;
    }

    public function index()
    {
        // Hanya menggunakan metode yang sudah ada di BarangService
        $dataBarang = $this->barangService->methodSatu();

        // ...

        return response()->json($dataBarang);
    }

    // Implementasikan metode CRUD lainnya
}
