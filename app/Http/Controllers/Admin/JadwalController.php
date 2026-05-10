<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dokter;

class JadwalController extends Controller
{
    public function index()
{
    $dokterList = Dokter::with('jadwal')->get();

    $totalJadwal = Jadwal::count();
    $totalDokterAktif = Dokter::has('jadwal')->count();

    $hariIni = [
        'Sunday'    => 'Minggu',
        'Monday'    => 'Senin',
        'Tuesday'   => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday'  => 'Kamis',
        'Friday'    => 'Jumat',
        'Saturday'  => 'Sabtu',
    ][now()->format('l')];

    $jadwalHariIni = Jadwal::where('hari', $hariIni)->count();

    return view('admin.jadwal', compact(
        'dokterList',
        'totalJadwal',
        'totalDokterAktif',
        'jadwalHariIni'
    ));
}

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id'   => 'required|exists:dokter,id',
            'hari'        => 'required|array',
            'poli'        => 'required|string',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        foreach ($request->hari as $hari) {

            Jadwal::create([
                'dokter_id' => $request->dokter_id,
                'hari'      => $hari,

                // masuk ke kolom klinik
                'klinik'    => $request->poli,

                // gabung jam
                'jam'       => $request->jam_mulai . ' - ' . $request->jam_selesai,

                'note'      => null,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        return response()->json($jadwal);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'poli'         => 'required|string',
            'jam_mulai'    => 'required',
            'jam_selesai'  => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'klinik' => $request->poli,

            'jam' => $request->jam_mulai .
                     ' - ' .
                     $request->jam_selesai,

            'note' => null,
        ]);

        return redirect()->back()
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->back()
            ->with('success', 'Jadwal berhasil dihapus');
    }
}