<?php

namespace App\Http\Controllers;

use App\Data;
use App\Anggota;
use App\Kelurahan;
use App\Kecamatan;
use App\Charts\AppChart;
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
        //$kotaid = Data::where('kecamatan',$_GET['kotaid'])->first();
        //$datakel = Anggota::where('anggotaid',$kotaid)->count();

        $kec = [];
        $idkec = [];
        $datakec=[];
        $datakel=[];
        foreach ($kecamatan as $value){
            $kec[] = $value->name;
            $idkec[] = $value->id;
            $datakec[] = Data::where('kecamatan',$value->id)->where('status',1)->count();
//            $datakel[] = Anggota::where('anggotaid',$datakec['nokk'])->get();

        }

//        $a = DB::table('km_kecamatan')->wherein('kota_id',$idkec)->where('status',1)->get()->toArray();
//        dd($a);
//        dd($datakec);
        $datakel = Anggota::where('anggotaid',$datakec)->count();
        $chart->labels($kec)->dataset('Total', 'bar', $datakec);
//        $chart->labels($kec)->dataset('Total', 'bar', $datakel);


//        $chart->dataset('Sample', 'line', [200, 45, 88, 35,890])
//            ->options([
//                'borderColor' =>'#ff0000'
//            ]);
        return view('hasil.wilayah',['chart'=>$chart,'countkk'=>$countkk,'countall'=>$countall]);
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
        //$kotaid = Data::where('kecamatan',$_GET['kotaid'])->first();
        //$datakel = Anggota::where('anggotaid',$kotaid)->count();

        $kec = [];
        $idkec = [];
        $datakec=[];
        $datakel=[];
        foreach ($kecamatan as $value){
            $kec[] = $value->name;
            $idkec[] = $value->id;
            $datakec[] = Data::where('kecamatan',$value->id)->where('status',1)->count();
//            $datakel[] = Anggota::where('anggotaid',$datakec['nokk'])->get();

        }

//        $a = DB::table('km_kecamatan')->wherein('kota_id',$idkec)->where('status',1)->get()->toArray();
//        dd($a);
//        dd($datakec);
        $datakel = Anggota::where('anggotaid',$datakec)->count();
        $chart->labels($kec)->dataset('Total', 'bar', $datakec);
//        $chart->labels($kec)->dataset('Total', 'bar', $datakel);


//        $chart->dataset('Sample', 'line', [200, 45, 88, 35,890])
//            ->options([
//                'borderColor' =>'#ff0000'
//            ]);
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
