<?php

namespace App\Http\Controllers;

use App\Common\AppHelper;
use App\Models\Formulir;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Validator;

class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulir = Formulir::latest()->get();
        return view('formulir.index', compact('formulir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = AppHelper::getListKecamatan();
        $kec = Kecamatan::pluck('name','id')->toArray();
//        $kel = Kelurahan::pluck('name','kecamatan_id')->toArray();
//        dd($kel);
        $kelurahan = AppHelper::getAllKelurahan();

        return view('formulir.create', compact('kecamatan', 'kelurahan','kec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nokk' => 'required|unique:formulir|max:20',
            'namakk' => 'required|string|max:150',
            'notelp' => 'max:20',
            'jumlah' => 'numeric',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('formulir.create')
                ->withErrors($validator)
                ->withInput();
        }

        $formulir = new Formulir();
        $formulir->nokk = $request->nokk;
        $formulir->nama = $request->namakk;
        $formulir->notelp = $request->notelp;
        $formulir->jumlah = $request->jumlah;
        $formulir->kelurahan = $request->kelurahan;
        $formulir->kecamatan = $request->kecamatan;
        $formulir->save();

        return redirect()->route('formulir.create')->with('Success','Data Formulir telah tersimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Formulir::find($id);
        $kecamatan = Kecamatan::pluck('name','id')->toArray();
        $kelurahan = Kelurahan::pluck('name','id_kelurahan')->toArray();
//        $kecamatan = AppHelper::getListKecamatan();
        return view('formulir.edit', compact('data', 'kecamatan','id','kelurahan'));
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
        $data = Formulir::find($id);
        $data->nokk = $request->nokk;
        $data->nama = $request->namakk;
        $data->notelp = $request->notelp;
        $data->jumlah = $request->jumlah;
        $data->kelurahan = $request->kelurahan;
        $data->kecamatan = $request->kecamatan;
        $data->save();
        return redirect()->route('formulir.edit',$id)->with('Success','Data formulir telah diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Formulir::find($id)->delete();

        return redirect()->route('formulir.index')
            ->with('pesan', 'Data berhasil di hapus');
    }

    public function getKelurahan($kode)
    {
        return AppHelper::getJsonKelurahan($kode);
    }
}
