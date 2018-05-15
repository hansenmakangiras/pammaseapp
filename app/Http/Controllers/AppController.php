<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Charts\AppChart;
use App\Data;
use App\Kecamatan;
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
        $chart = new AppChart;
        $chart2 = new AppChart;
        $countkk = Data::where('status',1)->count();
        $countall = Anggota::where('status',1)->count();

        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status',1)->get();

        $kec = [];
        $idkec = [];
        $datakec=[];
        foreach ($kecamatan as $value){
            $kec[] = $value->name;
            $idkec[] = $value->id;
            $datakec[] = Data::where('kecamatan',$value->id)->where('status',1)->with(['anggota','kelurahan','kecamatan'])->count();
        }

        $chart->labels($kec)->dataset('Data KK', 'bar', $datakec)
            ->backgroundColor('#39CCCC');
        $chart2->labels($kec)->dataset('Formulir', 'pie', $datakec);
//            ->backgroundColor('#f39c12');

        return view('home',['chart'=>$chart,'chart2'=>$chart2,'countkk'=>$countkk,'countall'=>$countall]);
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

}
