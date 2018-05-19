<?php

namespace App\Http\Controllers;

use App\Common\AppHelper;
use App\Models\Anggota;
use App\Models\Data;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Anggota::latest()->where('status', 1)->with(['data'])->get();
        $trashed = AppHelper::getTrashedData();

        return view('anggota.index', compact('data','trashed'))
            ->with('i', (\request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nokk = Data::where('status',1)->pluck('nokk','nokk')->toArray();
        return view('anggota.create',compact('nokk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nokk' => 'required|max:20',
            'nama' => 'required|string|max:150',
            'umur' => 'numeric',
        ]);

        if($validatedData){
            $anggota = new Anggota();
            $anggota->anggotaid = $request->nokk;
            $anggota->nama = $request->nama;
            $anggota->umur = $request->umur;
            $anggota->status =1;
            $anggota->save();
            return redirect()->route('anggota.create')->with('Success', 'Anggota berhasil ditambahkan');
        }

        return redirect()->route('anggota.create')->with('Error', 'Anggota Keluarga Gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Anggota::where('anggotaid',$id)->get();

        return view('anggota.view', compact('data','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nokk = Data::where('status',1)->pluck('namakk','nokk')->toArray();
        $data = Anggota::findOrFail($id);
        return view('anggota.edit', compact('data','nokk','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Anggota::findOrFail($id);
//        $data->anggotaid = $request->nokk;
        $data->nama = $request->nama;
        $data->umur = $request->umur;
        $data->save();
        return redirect()->route('anggota.edit',$id)->with('Success','Data anggota berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::find($id)->delete();

        return redirect()->route('anggota.index')
            ->with('pesan', 'Data berhasil di hapus');
    }
}
