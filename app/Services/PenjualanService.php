<?
// app/Services/PenjualanService.php

namespace App\Services;
use App\Models\Penjualan;
class PenjualanService
{
    public function getAllPenjualan()
    {
        // Logika untuk mendapatkan semua penjualan
        return Penjualan::all();
    }

    public function getPenjualanByKode($kode)
    {
        // Logika untuk mendapatkan penjualan berdasarkan kode
        return Penjualan::where('kode', $kode)->first();
    }

    public function createPenjualan($data)
    {
        // Logika untuk membuat penjualan baru
        return Penjualan::create($data);
    }

    public function getPenjualanByDateRange($start, $end)
    {
        // Logika untuk mendapatkan penjualan berdasarkan rentang tanggal
        return Penjualan::whereBetween('tanggal', [$start, $end])->paginate(10);
    }

    public function deletePenjualan($kode)
    {
        // Logika untuk menghapus penjualan berdasarkan kode
        $penjualan = Penjualan::where('kode', $kode)->firstOrFail();
        $penjualan->delete();

        return ['message' => 'Penjualan berhasil dihapus'];
    }
}