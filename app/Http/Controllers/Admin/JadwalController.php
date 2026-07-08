<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\AdminDataDokter;

class JadwalController extends Controller
{
    private function getNote(string $jamMulai): string
    {
        $hour = (int) explode(':', $jamMulai)[0];

        return match(true) {
            $hour >= 5  && $hour < 12 => 'Pagi',
            $hour >= 12 && $hour < 15 => 'Siang',
            $hour >= 15 && $hour < 19 => 'Sore',
            default                   => 'Malam',
        };
    }

    public function index()
    {
        $dokterList = AdminDataDokter::with('jadwal')->get();

        $totalJadwal       = Jadwal::count();
        $totalDokterAktif  = AdminDataDokter::has('jadwal')->count();

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
            'dokter_id'   => 'required|exists:admin_data_dokters,id',
            'hari'        => 'required|array',
            'poli'        => 'required|string',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        foreach ($request->hari as $hari) {
            Jadwal::create([
                'dokter_id' => $request->dokter_id,
                'hari'      => $hari,
                'klinik'    => $request->poli,
                'jam'       => $request->jam_mulai . ' - ' . $request->jam_selesai,
                'note'      => $this->getNote($request->jam_mulai),
            ]);
        }

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        return response()->json(Jadwal::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'poli'        => 'required|string',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'klinik' => $request->poli,
            'jam'    => $request->jam_mulai . ' - ' . $request->jam_selesai,
            'note'   => $this->getNote($request->jam_mulai),
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
}