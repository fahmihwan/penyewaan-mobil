<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        return view('pages.riwayat.index', [
            'items' => Transaksi::with('user')->where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function show($id)
    {
        $mobil = Mobil::with('user')->where('id', $id)->first();
        return view('pages.riwayat.show', [
            'mobil' => $mobil
        ]);
    }
}
