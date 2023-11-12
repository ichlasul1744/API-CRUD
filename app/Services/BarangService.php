<?php


namespace App\Services;
use App\Models\Barang;
class BarangService
{
    public function methodSatu()
    {
        // Logika bisnis untuk method dua
    }

    // Tambahkan metode bisnis lainnya sesuai kebutuhan
    public function getAllBarang()
    {
        // Logika untuk mendapatkan semua barang
        return Barang::all();
    }

    public function getBarangById($id)
    {
        // Logika untuk mendapatkan barang berdasarkan ID
        return Barang::findOrFail($id);
    }

    public function createBarang($data)
    {
        // Logika untuk membuat barang baru
        return Barang::create($data);
    }

    public function updateBarang($id, $data)
    {
        // Logika untuk memperbarui barang berdasarkan ID
        $barang = Barang::findOrFail($id);
        $barang->update($data);

        return $barang;
    }

    public function deleteBarang($id)
    {
        // Logika untuk menghapus barang berdasarkan ID
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return ['message' => 'Barang berhasil dihapus'];
    }
}
