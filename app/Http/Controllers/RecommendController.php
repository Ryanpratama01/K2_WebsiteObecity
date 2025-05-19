<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recommend;

class RecommendController extends Controller
{
    /**
     * Tampilkan semua data rekomendasi.
     */
    public function index()
    {
        $recommends = Recommend::orderBy('id_rekomendasi', 'DESC')->get();
        return view('recommends.rekomendasi', compact('recommends'));
    }

    /**
     * Tampilkan form untuk menambahkan rekomendasi baru.
     */
    public function create()
    {
        return view('recommends.create');
    }

    /**
     * Simpan data rekomendasi ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_bmi'    => 'required|string',
            'definisi'        => 'nullable|string',
            'saran_makanan'   => 'nullable|string',
            'saran_aktivitas' => 'nullable|string',
            'saran_lain'      => 'nullable|string',
        ]);

        Recommend::create([
            'kategori_bmi'    => $request->kategori_bmi,
            'definisi'        => $request->definisi,
            'saran_makanan'   => $request->saran_makanan,
            'saran_aktivitas' => $request->saran_aktivitas,
            'saran_lain'      => $request->saran_lain,
        ]);

        return redirect()->route('recommends')->with('success', 'Rekomendasi berhasil ditambahkan');
    }

    /**
     * Tampilkan detail rekomendasi berdasarkan ID.
     */
    public function show(string $id)
    {
        $recommend = Recommend::findOrFail($id);
        return view('recommends.show', compact('recommend'));
    }

    /**
     * Tampilkan form edit rekomendasi.
     */
    public function edit(string $id)
    {
        $recommend = Recommend::findOrFail($id);
        return view('recommends.edit', compact('recommend'));
    }

    /**
     * Update data rekomendasi.
     */
    public function update(Request $request, string $id)
    {
        $recommend = Recommend::findOrFail($id);

        $request->validate([
            'kategori_bmi'    => 'required|string',
            'definisi'        => 'nullable|string',
            'saran_makanan'   => 'nullable|string',
            'saran_aktivitas' => 'nullable|string',
            'saran_lain'      => 'nullable|string',
        ]);

        $recommend->update([
            'kategori_bmi'    => $request->kategori_bmi,
            'definisi'        => $request->definisi,
            'saran_makanan'   => $request->saran_makanan,
            'saran_aktivitas' => $request->saran_aktivitas,
            'saran_lain'      => $request->saran_lain,
        ]);

        return redirect()->route('recommends')->with('success', 'Rekomendasi berhasil diperbarui');
    }

    /**
     * Hapus data rekomendasi berdasarkan ID.
     */
    public function destroy(string $id)
    {
        $recommend = Recommend::findOrFail($id);
        $recommend->delete();

        return redirect()->route('recommends')->with('success', 'Rekomendasi berhasil dihapus');
    }
}
