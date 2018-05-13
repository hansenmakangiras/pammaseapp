<?php

namespace App\Http\Controllers;

use App\Data;
use App\Anggota;
use App\Kelurahan;
use App\Kecamatan;
use App\Charts\AppChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart = new AppChart;
        $countkk = Data::where('status',1)->count();
        $countall = Anggota::where('status',1)->count();

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

        $a = DB::table('km_kecamatan')->wherein('kota_id',$idkec)->where('status',1)->get()->toArray();
//        dd($a);
//        dd($datakec);
        $datakel = Anggota::where('anggotaid',$datakec)->count();
        $chart->labels($kec)->dataset('Total', 'bar', $datakec)
//            ->color('#39CCCC')
            ->backgroundColor('#39CCCC')
            ->options([
                'ticks '=>['beginAtZero'=>false],
                'scaleSteps' => 10,
                'scaleStepWidth' => 50,
                'scaleStartValue' => 0
            ]);
//        $chart->labels($kec)->dataset('Total', 'bar', $datakel);


//        $chart->dataset('Sample', 'line', [200, 45, 88, 35,890])
//            ->options([
//                'borderColor' =>'#ff0000'
//            ]);

        return view('home',['chart'=>$chart,'countkk'=>$countkk,'countall'=>$countall]);
    }

    /**
     * Show a sample chart.
     *
     * @return Response
     */
    public function chart()
    {
        $chart = new AppChart();
        return view('welcome',compact('chart'));
    }

}
