<?php

namespace App\Http\Controllers;

use App\Services\PenjualanService;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    private $penjualanService;

    public function __construct(PenjualanService $penjualanService)
    {
        $this->penjualanService = $penjualanService;
    }

    public function index()
    {
        $dataPenjualan = $this->penjualanService->getAllPenjualan();
        return response()->json($dataPenjualan);
    }

    public function show($kode)
    {
        $penjualan = $this->penjualanService->getPenjualanByKode($kode);
        return response()->json($penjualan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pembeli' => 'required|string|max:255',
            'no_hp_pembeli' => 'required|string|max:15',
            'total_harga' => 'required|numeric',
            // tambahkan validasi sesuai kebutuhan
        ]);

        $result = $this->penjualanService->createPenjualan($request->all());
        return response()->json($result, 201);
    }

    public function showByDateRange(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $dataPenjualan = $this->penjualanService->getPenjualanByDateRange(
            $request->input('start_date'),
            $request->input('end_date')
        );

        return response()->json($dataPenjualan);
    }

    public function destroy($kode)
    {
        $result = $this->penjualanService->deletePenjualan($kode);
        return response()->json($result);
    }
}