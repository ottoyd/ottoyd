<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view ('barang', ['barangs'=>$barangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kehilangan()
    {
        $pelapor = Auth::user();
        return view ('laporan', ['pelapor'=>$pelapor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menemukan()
    {
        $penemu = Auth::user();
        return view ('laporan', ['penemu'=>$penemu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('foto')->store('public/barang');
        $input = $request->all();

        if($input['pelapor_id']) {
            $input['foto_bukti'] = $path;
        }
        else if($input['penemu_id']) {
            $input['foto_barang'] = $path;
        }

        unset($input['foto']);
        unset($input['_token']);
        Barang::create($input);

         return redirect('/barang');
    }

    /**
     * Display the specified resource.
     
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view ('laporan', [
            'barang' => $barang,
            'pelapor' => $barang->pelapor,
            'penemu'  => $barang->penemu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $path = $request->file('foto')->store('public/barang');
        if ($barang->foto_bukti)
        {
            $barang->foto_barang = $path;
        }
        else
        {
            $barang->foto_bukti = $path;
        }

        $barang->save();
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
