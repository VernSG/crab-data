<?php

namespace App\Http\Controllers;

use App\Models\CatchRecord;
use Illuminate\Http\Request;

class CatchRecordController extends Controller
{
    public function create()
    {
        return view('input');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_masehi' => 'required|date',
            'tanggal_jawa' => 'required|integer|min:1|max:30',
            'lokasi_blok' => 'required|in:Perumahan,Pasar,Belakang SD,Kapal Kecil,Samping Batavia',
            'hasil_kg' => 'required|numeric|min:0',
        ]);

        CatchRecord::create($validated);

        return redirect()->route('input')->with('success', 'Data tangkapan berhasil disimpan!');
    }

    public function history()
    {
        $records = CatchRecord::latest('tanggal_masehi')->latest('id')->get();

        return view('history', compact('records'));
    }
}
