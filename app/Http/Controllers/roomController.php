<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use PDF;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('room.index')->with([
            'room' => Room::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'room'=>'required',
            'tipe'=>'required',
            'harga'=>'required',
        ]);

        $room = new Room;
        $room->No_Room = $request->room;
        $room->Tipe_Room = $request->tipe;
        $room->Harga_Room = $request->harga;
        $room->save();

        return redirect()->route('room.index')->with('success', 'Data Berhasil di tambah.');
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
    public function edit(string $ID_Room )
    {
        return view('room.edit')->with([
            'room' => Room::find($ID_Room),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ID_Room)
    {
        $validated = $request -> validate([
            'ro'=>'required',
            'tipe'=>'required',
            'harga'=>'required',
        ]);

        $room = Room::find($ID_Room);
        $room->No_Room = $request->ro;
        $room->Tipe_Room = $request->tipe;
        $room->Harga_Room = $request->harga;
        $room->save();

        return redirect()-> route('room.index')->with('success','Data Berhasil di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ID_Room)
    {
        $room = Room::find($ID_Room);
        $room -> delete();

        return back()->with('success','Data Berhasil di Hapus');
    }

    public function mhsdownloadPdf(){
        $room = Room::all();
        $pdf = PDF::loadView('room.laporan',['room'=>$room])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('laporan-room.pdf');
    }
}
