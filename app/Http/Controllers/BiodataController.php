<?php
namespace App\Http\Controllers;

use App\Models\Biodata_1198;
use App\Models\Pengalaman_1198;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata    = Biodata_1198::first();
        $pengalaman = Pengalaman_1198::all();
        return view('biodata.index', compact('biodata', 'pengalaman'));
    }

    public function storeBiodata(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required',
            'nim'           => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email',
            'no_hp'         => 'required',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profil', 'public');
        }

        Biodata_1198::create($data);
        return redirect()->back()->with('success', 'Biodata berhasil disimpan!');
    }

    public function updateBiodata(Request $request, $id)
    {
        $biodata = Biodata_1198::findOrFail($id);

        $request->validate([
            'nama_lengkap'  => 'required',
            'nim'           => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email',
            'no_hp'         => 'required',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }
            $data['foto'] = $request->file('foto')->store('profil', 'public');
        }

        $biodata->update($data);
        return redirect()->back()->with('success', 'Biodata berhasil diperbarui!');
    }

    public function storePengalaman(Request $request)
    {
        $request->validate([
            'posisi'     => 'required',
            'organisasi' => 'required',
            'periode'    => 'required',
            'deskripsi'  => 'required',
        ]);

        Pengalaman_1198::create($request->all());
        return redirect()->back()->with('success', 'Pengalaman berhasil ditambahkan!');
    }

    public function destroyPengalaman($id)
    {
        $pengalaman = Pengalaman_1198::findOrFail($id);
        $pengalaman->delete();
        return redirect()->back()->with('success', 'Pengalaman berhasil dihapus!');
    }
}
