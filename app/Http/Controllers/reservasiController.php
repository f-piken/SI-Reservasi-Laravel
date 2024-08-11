<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservasi;
use App\Models\Room;
use Illuminate\Http\Request;
use PDF;

class reservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = Reservasi::with(['customer','room'])->get();
        return view('reservasi.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cus = Customer::all();
        $room = Room::all();

        return view('reservasi.create', compact('cus','room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'room' => 'required',
            'tgl' => 'required',
        ]);

        // Membuat data baru dari tabel reservasi
        $res = new Reservasi;
        $res->ID_Customer = $request->nama;
        $res->ID_Room = $request->room;
        $res->Tanggal_Reservasi = $request->tgl;
        $res->Waktu_Reservasi = now();
        $res->save();

        return redirect()->route('reservasi.index')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ID_Reservasi)
    {
        $res = Reservasi::findOrFail($ID_Reservasi);
        $cus = Customer::all(); // Untuk dropdown
        $room = Room::all(); // Untuk dropdown

        return view('reservasi.edit', compact('res','cus','room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ID_Resevasi)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'room' => 'required',
            'tgl' => 'required',
        ]);
    
        $res = Reservasi::find($ID_Resevasi);
        $res->ID_Customer = $request->nama;
        $res->ID_Room = $request->room;
        $res->Tanggal_Reservasi = $request->tgl;
        $res->Waktu_Reservasi = now();
        $res->save();
    
        return redirect()->route('reservasi.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ID_Resevasi)
    {
        $res = Reservasi::find($ID_Resevasi);
        $res -> delete();

        return back()->with('success','Data Berhasil di Hapus');
    }

    public function cusPdf(){
        $res = Reservasi::all();
        $pdf = PDF::loadView('reservasi.laporan',['res'=>$res])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('laporan-reservasi.pdf');
    }
}
