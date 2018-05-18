<?php

namespace App\Http\Controllers;

use App\Charts\AppChart;
use App\Models\Anggota;
use App\Models\Data;
use App\Models\Formulir;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
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
        return view('home',['chart'=>$chart,'chart2'=>$chart2,'countkk'=>$countkk,'countall'=>$countall,'countformulir'=>$total]);
    }

    public function getListKecamatan()
    {
        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status',1)->get();
        return $kecamatan;
    }

    public function getJsonKecamatan(){

        $lst = [];
        $kec =[];
        $count=[];

        $listKec = DB::table('km_kecamatan')
            ->select(['name','id'])
            ->where('kota_id','7313')
            ->where('status',1)
            ->get()->toArray();

        $kecamatan = DB::table('km_kecamatan')
            ->select('id')
            ->where('kota_id','7313')
            ->where('status',1)
            ->get()->toArray();

        foreach ($listKec as $value) {
            $lst[] = $value->name;
            foreach ($kecamatan as $item) {
                $kec[] = $item->id;
                if($value->id == $item->id){
                    $count[] = DB::table('data')
                        ->where('kecamatan',$item->id)
                        ->count();
                }
            }
        }
//        dd($count);

        $arr = ['kecamatan'=>$lst,'dataset'=>$count];
        return json_encode($arr);
    }

    public function getJsonKelurahan(){

        $lst = [];
        $kec =[];
        $count=[];

        $listKec = DB::table('km_kelurahan')
            ->select(['name','id_kelurahan'])
            ->where('kecamatan_id','7313')
            ->where('status',1)
            ->get()->toArray();

        $kecamatan = DB::table('km_kecamatan')
            ->select('id')
            ->where('kota_id','7313')
            ->where('status',1)
            ->get()->toArray();

        foreach ($listKec as $value) {
            $lst[] = $value->name;
            foreach ($kecamatan as $item) {
                $kec[] = $item->id;
                if($value->id == $item->id){
                    $count[] = DB::table('data')
                        ->where('kecamatan',$item->id)
                        ->count();
                }
            }
        }
//        dd($count);

        $arr = ['kecamatan'=>$lst,'dataset'=>$count];
        return json_encode($arr);
    }

}
