<?php

namespace App\Http\Controllers;

use App;
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listKec = AppHelper::getSelectKecamatan();
        $countkk = Data::where('status',1)->count();
        $countall = Anggota::where('status',1)->count();

        // ambil data kecamatan dalam database
        $kecamatan = AppHelper::getListKecamatan();
        $data = [];
        $listKel = [];
        $countform = [];
        $countKartu = [];
        $countDPT = [];
//        $countAllKec = [];
        $countKec = 0;
        $countKel = 0;


        // looping data kecamatan
        foreach ($kecamatan as $key => $value){
            $formulir = Formulir::where('kecamatan',$value->id)->get();
            $countKartu[] = $value->total_kartu_final;
            $countDPT[] = $value->total_dpt;
            //$countAllKec[] = $value->data->count();
            foreach ( $formulir as $item) {
                $countform[] = $item->jumlah;
            }
        }
//        $countAllKecam = array_sum($countAllKec);
        $countformulir = array_sum($countform);
        $jumKartu = array_sum($countKartu);
        $jumDPT = array_sum($countDPT);
//        dd($countAllKecam);

        if($request->hasAny('kecamatan','kelurahan')){
            if($request->get('kecamatan') && empty($request->get('kelurahan'))){
                $data = $this->getDataWithRelations($request->kecamatan);
                $kelurahan = $this->getKelurahanDataWithRelations($request->kecamatan);

                $countKec = AppHelper::getCountKecamatan($request->kecamatan);
                $countKel = AppHelper::getCountKelurahan($request->kecamatan, $request->kelurahan);
                $listKel = AppHelper::getSelectKelurahan($request->kecamatan);
//                dd($listKel);
                return view('laporan.wilayah',compact('data',
                    'kelurahan',
                    'listKel',
                    'countform',
                    'countall',
                    'countkk',
                    'countformulir',
                    'listKec',
                    'countKec',
                    'countKel'
                ));

            }elseif($request->get('kecamatan') && $request->get('kelurahan')){
                $data = $this->getDataWithRelations($request->kecamatan, $request->kelurahan);
                $kelurahan = Kelurahan::where('kecamatan_id',$request->kecamatan)->get();

                $listKel = AppHelper::getSelectKelurahan($request->kecamatan);
                $countKec = AppHelper::getCountKecamatan($request->kecamatan);
                $countKel = AppHelper::getCountKelurahan($request->kecamatan, $request->kelurahan);

                return view('laporan.wilayah',compact('data',
                    'kelurahan',
                    'listKel',
                    'countform',
                    'countall',
                    'countkk',
                    'countformulir',
                    'listKec',
                    'countKel',
                    'countKec'
                ));
            }
        }

//        $this->exportPDF($request);
//        dd($countAllKec);
        return view('laporan.wilayah',[
            'data'=>$data,
            'listKel'=>$listKel,
            'countkk'=>$countkk,
            'countall'=>$countall,
            'countformulir'=>$countformulir,
            'listKec'=>$listKec,
            'countKec' =>$countKec,
            'countKel' =>$countKel,
            'countDpt' => $jumDPT,
            'countKartu' => $jumKartu,
        ]);
    }

    public function exportPDF(Request $request){
        $data = Data::latest()->with(['anggota']);
        if($request->hasAny('kecamatan','kelurahan')){
            if($request->get('kecamatan') && empty($request->get('kelurahan'))){
                //dd($request->all());
                $data->where('kecamatan',$request->kecamatan);

            }elseif($request->get('kecamatan') && $request->get('kelurahan')) {
                $data->where('kecamatan', $request->kecamatan)
                    ->where('kelurahan', $request->kelurahan);
            }

        }
        $data->where('status',1)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('template.pdf', compact('data'));
        return $pdf->stream('laporan.pdf');

    }

    protected function getDataWithRelations($param, $kelurahan = ""){
        if(!empty($kelurahan)){
            return Data::latest()
                ->with(['anggota','kecamatan','kelurahan'])
                ->where('status', 1)
                ->where('kecamatan',$param)
                ->where('kelurahan',$kelurahan)
                ->get();
        }
        return Data::latest()
            ->with(['anggota','kecamatan','kelurahan'])
            ->where('status', 1)
            ->where('kecamatan',$param)
            ->get();
    }

    protected function getKecamatanDataWithRelations($param){
        return Data::latest()
            ->with(['anggota','kecamatan','kelurahan'])
            ->where('status', 1)
            ->where('kecamatan',$param)
            ->get();
    }
    protected function getKelurahanDataWithRelations($param){
        return Kelurahan::where('kecamatan_id',$param)
            ->with(['data','kecamatan'])
            ->get();
    }
}
