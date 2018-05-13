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

        $kec = [];
        $idkec = [];
        $datakec=[];
        foreach ($kecamatan as $value){
            $kec[] = $value->name;
            $idkec[] = $value->id;
            $dataw[] = Data::where('kecamatan',$value->id)->where('status',1)->with(['anggota','kelurahan','kecamatan'])->get();
//            $datakec = $dataw->anggota()->count();
        }

        $a = DB::table('km_kecamatan')->wherein('kota_id',$idkec)->where('status','=',1)->get()->toArray();
        $datakel = Anggota::where('anggotaid',$kecamatan)->count();
        dd($dataw);
        $chart->labels($kec)->dataset('Total', 'bar', $datakec)
            ->backgroundColor('#39CCCC');

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
