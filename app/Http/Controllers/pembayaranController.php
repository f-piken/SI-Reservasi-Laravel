<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pem = Pembayaran::with(['reservasi','customer'])->get();
        return view('pembayaran.index', compact('pem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $res = Reservasi::all();
        $customer = Customer::all();

        return view('pembayaran.create', compact('res','customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'res' => 'required',
            'cus' => 'required',
            'total' => 'required',
            'metod' => 'required',
        ]);

        // Membuat data baru dari tabel pembayaran
        $pem = new Pembayaran;
        $pem->ID_Reservasi = $request->res;
        $pem->ID_Customer = $request->cus;
        $pem->Total = $request->total;
        $pem->Metode_Pembayaran = $request->metod;
        $pem->save();

        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $ID_Pembayaran)
    {
        $pem = Pembayaran::find($ID_Pembayaran);
        $res = Reservasi::all();
        $customer = Customer::all();

        return view('pembayaran.edit', compact('pem','res','customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ID_Pembayaran)
    {
        $validate = $request->validate([
            'res' => 'required',
            'cos' => 'required',
            'total' => 'required',
            'metod' => 'required',
        ]);
    
        $pem = Pembayaran::find($ID_Pembayaran);
        $pem->ID_Reservasi = $request->res;
        $pem->ID_Customer = $request->cos;
        $pem->Total = $request->total;
        $pem->Metode_Pembayaran = $request->metod;
        $pem->save();
    
        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ID_Pembayaran)
    {
        $pem = Pembayaran::find($ID_Pembayaran);
        $pem -> delete();

        return back()->with('success','Data Berhasil di Hapus');
    }

    public function cusPdf(){
        $pem = Pembayaran::all();
        $pdf = PDF::loadView('pembayaran.laporan',['pem'=>$pem])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('laporan-pembayaran.pdf');
    }
}
