<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Barang;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() 
    {
        $barangs = Barang::all();

        return view('backend.pages.barang.tables', compact('barangs'));
    }

    public function show($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barang) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('backend.pages.barang.show', ['barang' => $barang]);
    }
    public function edit($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barang) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('backend.pages.barang.edit', ['barang' => $barang]);
    }
    public function update(Request $request, Barang $barang)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'kode' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'total' => 'required|integer',
            'stok' => 'required|integer',
            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);
    
        // Update data barang
        $barang->update($validatedData);
    
        // Redirect atau tindakan lain setelah berhasil diupdate
        return redirect()->route('admin.barang')->with('success', 'Barang terupdate');
    }
    
public function destroy($id)
{
    $barang = Barang::findOrFail($id); // Temukan data barang berdasarkan ID
    $barang->delete(); // Hapus data barang

    // Redirect atau tindakan lain setelah berhasil dihapus
    return redirect()->route('admin.barang')->with('success', 'Barang tersimpan!');

}
public function create()
{
    return view('backend.pages.barang.tambah');
}

public function store(Request $request) 
{
    // Validate the incoming request
    $validated = $request->validate([
        'barang' => 'required',
        'kategori' => 'required',
        'total' => 'required',
        'stok' => 'required|numeric',
    ]);

    // Generate a unique code
    $kode = $this->generateUniqueKode();

    // Add the generated kode to the validated data
    $validated['kode'] = $kode;

    // Create the new barang record
    Barang::create($validated);

    // Redirect with a success message
    return redirect()->route('admin.barang')->with('success', 'Barang tersimpan!');
}

/**
 * Generate a unique kode.
 *
 * @return string
 */
private function generateUniqueKode()
{
    do {
        // Generate a unique code
        $kode = 'BRG-' . Str::upper(Str::random(8)); // Example: BRG-4F3A5D7B
    } while (Barang::where('kode', $kode)->exists()); // Check if the code already exists

    return $kode;
}

}
