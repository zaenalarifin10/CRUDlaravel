<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangjual;

use Illuminate\Http\Request;

class BarangjualController extends Controller
{
    public function index()
    {
        $barangjuals = Barangjual::with("barang")->get();

        return view('backend.pages.jual.tables', compact('barangjuals'));
    }
    public function show($id)
    {
        // Mengambil data barang berdasarkan ID
        $barangjual = Barangjual::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barangjual) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('backend.pages.jual.show', ['barangjual' => $barangjual]);
    }
    public function edit($id)
    {
        // Mengambil data barang berdasarkan ID
        $barangjual = Barangjual::find($id);
        $jumlah = $barangjual->jumlah;
        $barangs = Barang::all();
        $barang = Barang::find($barangjual->id_barang);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barangjual) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('backend.pages.jual.edit', ['barangjual' => $barangjual, 'jumlah' => $jumlah, 'barangs'=> $barangs, 'barang'=> $barang]);
    }
    public function update(Request $request, Barangjual $barangjual)
{

    $validatedData = $request->validate([
        'jumlah' => 'required',
        'id_barang' => 'required',

    // tambahkan validasi untuk kolom lainnya sesuai kebutuhan
    ]);

    $item = Barangjual::where('id_barang',$validatedData['id_barang'])->first();
    $item->update(['jumlah'=> $validatedData['jumlah']]);

    // Redirect atau tindakan lain setelah berhasil diupdate
    return redirect()->route('admin.jual')->with('success','barang terupdate');
}
public function destroy($id)
{
    $barangjual = Barangjual::findOrFail($id); // Temukan data barang berdasarkan ID
    $barangjual->delete(); // Hapus data barang

    // Redirect atau tindakan lain setelah berhasil dihapus
    return redirect()->route('admin.jual')->with('success', 'Data Barang Berhasil di hapus!');

}
public function create()
{
    $barangs = Barang::all();
    return view('backend.pages.jual.tambah', compact('barangs'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required',
            'id_barang' => 'required',

        ]);

        Barangjual::create($validated);

        return redirect()->route('admin.jual')->with('success', 'Barang terjual!');
    }

}
