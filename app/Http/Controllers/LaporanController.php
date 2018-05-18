<?php

namespace App\Http\Controllers;

use App\Charts\AppChart;
use App\Models\Anggota;
use App\Models\Data;
use App\Models\Formulir;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // chart instance
        $chart = new AppChart;
        $chart2 = new AppChart;
        $countkk = Data::where('status',1)->count();
        $countall = Anggota::where('status',1)->count();
        $countformulir = Formulir::all()->count();

        // ambil data kecamatan dalam database
        $kecamatan = Kecamatan::where('kota_id', '7313')->with(['data','kelurahan'])->where('status',1)->get();

        // variabel data
        $kec = [];
        $kel = [];
        $idkec = [];
        $datakec=[];
        $datakel =[];

        // looping data kecamatan
        foreach ($kecamatan as $key => $value){
            $kec[] = $value->name;
            $idkec[$value->id] = $value->kelurahan()->where('status',1)->get();
            $datakec[] = Data::where('kecamatan',$value->id)->with(['kelurahan'])->where('status',1)->count();
//            $formulir[] = Formulir::where('kecamatan',$value->id)->count();
            $formulir = Formulir::where('kecamatan',$value->id)->get();
            foreach ( $formulir as $item) {
                $countform[] = $item->jumlah;
                $total = $item->jumlah += $item->jumlah;
            }
        }

        // looping data kelurahan
        foreach ($idkec as $item) {
            $v = $item;
            foreach ($v as $l) {
                $kel[] = $l->name;
                $datakel[] = Data::where('kelurahan',$l->id_kelurahan)->where('status',1)->count();
            }
        }

        // set data dan label untuk render chart
//        $chart->labels($kec)
//            ->dataset('Formulir', 'bar', $countform);
        $chart->labels($kec)
            ->dataset('Data KK', 'bar', $datakec)
            ->backgroundColor('#39CCCC');

        $chart2->labels($kec)
            ->minimalist(false)
            ->displayLegend(false)
            ->dataset('Formulir', 'bar', $countform)
            ->backgroundColor('#f56954');

        // tampilkan / render data chart pada view, serta mengeset variabel data
        return view('laporan.wilayah',['chart'=>$chart,'chart2'=>$chart2,'countkk'=>$countkk,'countall'=>$countall,'countformulir'=>$total]);
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
        return view('laporan.kelurahan',['chart'=>$chart,'countkk'=>$countkk,'countall'=>$countall]);
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
