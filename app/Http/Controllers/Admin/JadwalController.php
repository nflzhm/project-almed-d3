<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dokter;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokterList = Dokter::with('jadwal')->get();

        // statistik (sesuai blade kamu)
        $totalJadwal = Jadwal::count();
        $totalDokterAktif = Dokter::has('jadwal')->count();
        $jadwalHariIni = Jadwal::where('hari', now()->format('l'))->count();
        $totalSesi = Jadwal::distinct('sesi')->count('sesi');

        return view('admin.jadwal', compact(
            'dokterList',
            'totalJadwal',
            'totalDokterAktif',
            'jadwalHariIni',
            'totalSesi'
        ));
    }

    /**
     * Store new jadwal (bisa multi hari)
     */
    public function store(Request $request)
    {
        $request->validate([
            'dokter_id'    => 'required|exists:dokters,id',
            'hari'         => 'required|array',
            'poli'         => 'required|string',
            'jam_mulai'    => 'required',
            'jam_selesai'  => 'required',
            'sesi'         => 'required',
        ]);

        foreach ($request->hari as $hari) {
            Jadwal::create([
                'dokter_id'   => $request->dokter_id,
                'hari'        => $hari,
                'poli'        => $request->poli,
                'jam_mulai'   => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'sesi'        => $request->sesi,
            ]);
        }

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Show edit data (optional kalau pakai modal)
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return response()->json($jadwal);
    }

    /**
     * Update jadwal
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'poli'         => 'required|string',
            'jam_mulai'    => 'required',
            'jam_selesai'  => 'required',
            'sesi'         => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'poli'        => $request->poli,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'sesi'        => $request->sesi,
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui');
    }

    /**
     * Delete jadwal
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
}