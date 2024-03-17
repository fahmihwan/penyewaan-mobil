<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Spatie\Backtrace\Arguments\ReduceArgumentsAction;

use function PHPUnit\Framework\returnSelf;
use function Ramsey\Uuid\v1;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.mobil.index', [
            'items' => Mobil::with('user')->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =   $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required',
            'tarif_perhari' => 'required'
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['status_ketersediaan'] = 'tersedia';

        Mobil::create($validated);
        return redirect('/mobil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        $mobil = Mobil::with('user')->where('id', $mobil->id)->first();
        return view('pages.mobil.show', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('pages.mobil.edit', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $validated =   $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required',
            'tarif_perhari' => 'required'
        ]);

        Mobil::where('id', $mobil->id)->update($validated);

        return redirect('/mobil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        Mobil::destroy($mobil->id);
        return redirect()->back();
    }
}
