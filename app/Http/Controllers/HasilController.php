<?php

namespace App\Http\Controllers;

use App\Charts\AppChart;
use App\Models\Anggota;
use App\Models\Data;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart = new AppChart;
        $countkk = Data::all()->count();
        $countall = Anggota::all()->count();

        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status',1)->get();
        $kec = [];
        $idkec = [];
        $datakec=[];
        foreach ($kecamatan as $value){
            $kec[] = $value->name;
            $idkec[] = $value->id;
            $datakec[] = Data::where('kecamatan',$value->id)->where('status',1)->count();
        }

        $chart->labels($kec)->dataset('Total', 'line', $datakec)
            ->backgroundColor('#39CCCC');

        return view('home',['chart'=>$chart,'countkk'=>$countkk,'countall'=>$countall]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chart = new AppChart;
        $countkk = Data::all()->count();
        $countall = Anggota::all()->count();
        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status',1)->get();
        $kec = [];
        $idkec = [];
        $datakec=[];
        foreach ($kecamatan as $value){
            $kec[] = $value->name;
            $idkec[] = $value->id;
            $datakec[] = Data::where('kecamatan',$value->id)->where('status',1)->count();
        }
        $chart->labels($kec)->dataset('Total', 'bar', $datakec);
        return view('hasil.kelurahan',['chart'=>$chart,'countkk'=>$countkk,'countall'=>$countall]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
