<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PHPUnit\Event\Tracer\Tracer;

class TransaksiController extends Controller
{

    public function index()
    {
        $mobil = Mobil::with('user')->whereNot('user_id', auth()->user()->id);
        if (request('cari')) {
            $req = request('cari');
            $mobil->where('status_ketersediaan', 'like', '%' . $req . '%')
                ->orWhere('merk', 'like', '%' . $req . '%')
                ->orWhere('model', 'like', '%' . $req . '%');
        }

        return view('pages.transaksi.index', [
            'items' => $mobil->get()
        ]);
    }

    public function show($id)
    {
        $mobil = Mobil::with('user')->where('id', $id)->first();
        return view('pages.transaksi.show', [
            'mobil' => $mobil
        ]);
    }

    public function kdTransaksi($check)
    {
        if ($check->exists()) { //jika ada
            $getKode = $check->orderBy('kd_transaksi', 'desc')->limit(1)->first();
            $explode_number = explode('-', $getKode->kd_transaksi);
            $increment = (int)$explode_number[1] + 1;
            return $explode_number[0] . '-' . $increment;
        } else { //jika tidak ada
            $firstData = '#SWA' . str_replace('-', '', date('Y-m-d')) . '-1';
            return $firstData;
        }
    }

    public function store(Request $request)
    {
        $validated =   $request->validate([
            'tglmulai' => 'required',
            'tglselesai' => 'required',
            'periode' => 'required',
        ]);

        if ($validated['tglmulai'] < date('Y-m-d')) {
            return redirect()->back()->with('error', 'harap masukan tanggal dengan benar. contoh tanggal hari dan seterusnya');
        }

        $mobil = Mobil::where('id', $request->mobil_id)->first();
        $check = Transaksi::where('id', $request->mobil_id);
        $kdTransaksi = $this->kdTransaksi($check);

        $durasi = $request->periode;
        $tarif = $mobil->tarif_perhari;


        if ($request->periode <= 0) {
            return redirect()->back()->with('error', 'minimal sewa 1 hari');
        }

        Mobil::where('id', $request->mobil_id)->update([
            'status_ketersediaan' => 'di pakai'
        ]);

        Transaksi::create([
            'user_id' => auth()->user()->id,
            'mobil_id' => $request->mobil_id,
            'kd_transaksi' => $kdTransaksi,
            'tgl_transaksi' => date('Y-m-d'),
            'tgl_mulai' => $validated['tglmulai'],
            'tgl_selesai' => $validated['tglselesai'],
            'tarif' => $durasi * $tarif,
            'durasi' => $durasi,
            'staus_pengembalian' => 'di pinjam'
        ]);

        return redirect('transaksi');
    }

    public function viewpengembalian()
    {
        return view('pages.transaksi.pengembalian');
    }


    public function pengembalian(Request $request)
    {
        $validated =   $request->validate([
            'nomor_plat' => 'required',
        ]);

        $mobil_id = Mobil::where('nomor_plat', $validated['nomor_plat'])->first();
        if (!$mobil_id) {
            return redirect()->back()->with('error', 'mobil tidak di temukan');
        }

        $user_id = auth()->user()->id;

        $check = Transaksi::where('mobil_id', $mobil_id->id)->where('user_id', $user_id)->where('staus_pengembalian', 'di pinjam')->first();
        if (!$check) {
            return redirect()->back()->with('error', 'tidak ada transaksi penyewaan');
        }

        Mobil::where('id', $mobil_id->id)->update([
            'status_ketersediaan' => 'tersedia'
        ]);
        Transaksi::where('id', $check->id)->update([
            'staus_pengembalian' => 'selesai'
        ]);

        return redirect()->back()->with('success', 'Mobil berhasil di kembalikan, transaksi selesai');
    }
}
