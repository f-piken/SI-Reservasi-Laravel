<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\user;
use Illuminate\Http\Request;
use PDF;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cus = Customer::with(['User'])->get();
        return view('customer.index', compact('cus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = user::all();

        return view('customer.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            'email' => 'required',
            'id' => 'required',
        ]);

        // Membuat data baru dari tabel customer
        $cus = new Customer;
        $cus->Nama_Customer = $request->nama;
        $cus->Jenis_Kelamin = $request->kelamin;
        $cus->Alamat_Rumah = $request->alamat;
        $cus->No_Telp = $request->tlp;
        $cus->Email = $request->email;
        $cus->ID_User = $request->id;
        $cus->save();

        return redirect()->route('customer.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $ID_Customer)
    {
        $cus = Customer::findOrFail($ID_Customer);
        $user = user::all(); // Untuk dropdown
        return view('customer.edit', compact('cus','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ID_Customer)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);
    
        $cus = Customer::find($ID_Customer);
        $cus->Nama_Customer = $request->nama;
        $cus->Jenis_Kelamin = $request->kelamin;
        $cus->Alamat_Rumah = $request->alamat;
        $cus->No_Telp = $request->tlp;
        $cus->save();
    
        return redirect()->route('customer.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ID_Customer)
    {
        $cus = Customer::find($ID_Customer);
        $cus -> delete();

        return back()->with('success','Data Berhasil di Hapus');
    }

    public function cusPdf(){
        $cus = Customer::all();
        $pdf = PDF::loadView('customer.laporan',['cus'=>$cus])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('laporan-customer.pdf');
    }
}
