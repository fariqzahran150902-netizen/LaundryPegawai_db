<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::orderBy('id', 'desc')->get();
        return view('pelanggan.index', compact('pelanggan'));
    }
    public function create()
    {
        return view('pelanggan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_telepon'  => 'required|string',
            'berat'          => 'required|numeric',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_telepon'  => 'required|string',
            'berat'          => 'required|numeric',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
    public function deleteAll()
    {
        Pelanggan::truncate();

        return redirect()->route('pelanggan.index')->with('success', 'Semua data berhasil dihapus');
    }
}
