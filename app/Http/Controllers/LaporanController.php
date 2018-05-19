<?php

namespace App\Http\Controllers;

use App\Common\AppHelper;
use App\Models\Anggota;
use App\Models\Data;
use App\Models\Formulir;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allKec = AppHelper::getListKecamatan();
        $listKec = Kecamatan::pluck('name','id')->toArray();
        $allKel = AppHelper::getAllKelurahan();

        $countkk = Data::where('status',1)->count();
        $countall = Anggota::where('status',1)->count();

        // ambil data kecamatan dalam database
        $kecamatan = AppHelper::getListKecamatan();
        $data = [];
        $listKel = [];
        $kelurahan = [];

        // looping data kecamatan
        foreach ($kecamatan as $key => $value){
            $formulir = Formulir::where('kecamatan',$value->id)->get();
            foreach ( $formulir as $item) {
                $countform[] = $item->jumlah;
            }
        }

        $countformulir = array_sum($countform);

        if($request->hasAny('kecamatan','kelurahan')){
            if($request->get('kecamatan') && empty($request->get('kelurahan'))){
                $data = Data::latest()
                    ->with(['anggota'])
                    ->where('status', 1)
                    ->where('kecamatan',$request->kecamatan)
                    ->with(['anggota'])
                    ->get();

                $kelurahan = Kelurahan::where('kecamatan_id',$request->kecamatan)->get();

                $listkel = \DB::table('kp_kelurahan')
                    ->select('id_kelurahan','name')
                    ->where('kecamatan_id','=',$request->kecamatan)
                    ->get()->toArray();

                foreach ($listkel as $item) {
                    $listKel[$item->id_kelurahan] = $item->name;
                }

                return view('laporan.wilayah',compact('data',
                    'kelurahan',
                    'listKel',
                    'countform',
                    'countall',
                    'countkk',
                    'countformulir',
                    'listKec',
                    'listkel'
                ));

            }elseif($request->get('kecamatan') && $request->get('kelurahan')){
                $data = Data::latest()
                    ->where('status', 1)
                    ->where('kecamatan',$request->kecamatan)
                    ->where('kelurahan',$request->kelurahan)
                    ->with(['anggota'])
                    ->get();

                $kelurahan = Kelurahan::where('kecamatan_id',$request->kecamatan)->get();

                $listkel = \DB::table('kp_kelurahan')
                    ->select('id_kelurahan','name')
                    ->where('kecamatan_id','=',$request->kecamatan)
                    ->get()->toArray();

                foreach ($listkel as $item) {
                    $listKel[$item->id_kelurahan] = $item->name;
                }

                return view('laporan.wilayah',compact('data',
                    'kelurahan',
                    'listKel',
                    'countform',
                    'countall',
                    'countkk',
                    'countformulir',
                    'listKec',
                    'listkel'
                ));
            }
        }

        return view('laporan.wilayah',[
            'data'=>$data,
            'listKel'=>$listKel,
            'countkk'=>$countkk,
            'countall'=>$countall,
            'countformulir'=>$countformulir,
            'listKec'=>$listKec
        ]);
    }

    public function wilayah(Request $request){
        if ($request->ajax()){
            if ($request->has('kecamatan')){
                dd($request->all);
                $data = Data::where('kecamatan', $request->kecamatan)->with(['anggota'])->get();

            }
        }
        return redirect('/laporan',403);

    }
}
