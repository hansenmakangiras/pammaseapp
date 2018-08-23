<?php

namespace App\Http\Controllers;

use App\Charts\AppChart;
use App\Common\AppHelper;
use App\Common\rColor;
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
        $countkk = Data::where('status', 1)->count();
        $countall = Anggota::where('status', 1)->count();
        //$countformulir = Formulir::all()->count();

        // ambil data kecamatan dalam database
        $kecamatan = Kecamatan::where('kota_id', '7313')
            ->with(['data', 'kelurahan'])->where('status', 1)->get();

        // variabel data
        $kec = [];
        $kel = [];
        $idkec = [];
        $datakec = [];
        $datakel = [];
        $anggota = [];
        $kelur = [];
        $countKartu = [];
        $countDPT = [];
        $countform = [];

        // looping data kecamatan
        foreach ($kecamatan as $key => $value) {
            $kec[] = $value->name;
            $idkec[$value->id] = $value->kelurahan()->where('status', 1)->get();
            $datakec[] = $value->data()->count();
            $countKartu[] = $value->total_kartu_final;
            $countDPT[] = $value->total_dpt;
            $kelurahan = $value->kelurahan()->select('name')->get()->toArray();
            $formulir = Formulir::where('kecamatan', $value->id)->get();
            foreach ($formulir as $item) {
                $countform[] = $item->jumlah;
            }
        }
        foreach ($kelurahan as $item) {
            $kelur[] = $item['name'];
        }
        //dd($kelur);
        $total = array_sum($countform);

        // looping data kelurahan
        foreach ($idkec as $item) {
            $v = $item;
            foreach ($v as $l) {
                $kel[] = $l->name;
                $datakel[] = Data::where('kelurahan', $l->id_kelurahan)
                    ->where('status', 1)->count();
            }
        }
        $jumKartu = array_sum($countKartu);
        $jumDPT = array_sum($countDPT);
//        dd($jumKartu);

        // set data dan label untuk render chart
//        $chart->labels($kec)
//            ->dataset('Formulir', 'bar', $countform);
        $chart->labels($kec)
            ->dataset('Jumlah Kartu Tercetak', 'bar', $countKartu)
            ->backgroundColor('#00c0ef')
            ;
        $chart->labels($kec)
            ->dataset('Jumlah KK', 'bar', $datakec)
            ->backgroundColor('#f56954')
            ;

        $chart2->labels($kec)
            ->minimalist(true)
            ->displayLegend(true)
            ->dataset('Jumlah DPT', 'pie', $countDPT)
            ->backgroundColor($this->randomColor(26));

        // tampilkan / render data chart pada view, serta mengeset variabel data
        return view('home', [
            'chart' => $chart,
            'chart2' => $chart2,
            'countkk' => $countkk,
            'countall' => $countall,
            'countformulir' => $total,
            'countDpt' => $jumDPT,
            'countKartu' => $jumKartu,
        ]);
    }

    public function randomColor($num){
        $randColor = [];
        if(is_int($num)){
            for ($i=0; $i<$num;$i++){
                $randColor[$i] = rColor::generate();
            }
        }
        return $randColor;
    }

    public function getListKecamatan()
    {
        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status', 1)->get();

        return $kecamatan;
    }

    public function getJsonKecamatan()
    {
        $lst = [];
        $count = [];

        $listKec = AppHelper::getKecamatanArray(['name','id']);

        foreach ($listKec as $value) {
            $lst[] = $value['name'];
            $count[] = count($value['data']);
        }
        $arr = ['kecamatan' => $lst, 'dataset' => $count];

        return json_encode($arr);
    }

    public function getJsonKelurahan()
    {

        $lst = [];
        $kec = [];
        $count = [];

        $listKec = DB::table('km_kelurahan')
            ->select(['name', 'id_kelurahan'])
            ->where('kecamatan_id', '7313')
            ->where('status', 1)
            ->get()->toArray();

        $kecamatan = DB::table('km_kecamatan')
            ->select('id')
            ->where('kota_id', '7313')
            ->where('status', 1)
            ->get()->toArray();

        foreach ($listKec as $value) {
            $lst[] = $value->name;
            foreach ($kecamatan as $item) {
                $kec[] = $item->id;
                if ($value->id == $item->id) {
                    $count[] = DB::table('data')
                        ->where('kecamatan', $item->id)
                        ->count();
                }
            }
        }
//        dd($count);

        $arr = ['kecamatan' => $lst, 'dataset' => $count];

        return json_encode($arr);
    }

}
