<?php

namespace App\Http\Controllers;

use App\Common\AppHelper;
use App\Models\Anggota;
use App\Models\Data;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::latest()->where('status', 1)->with(['anggota'])->get();
        $trashed = AppHelper::getTrashedData();

        return view('data.index', compact('data','trashed'))
            ->with('i', (\request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $kecamatan = AppHelper::getListKecamatan();
        $kecamatan = AppHelper::getSelectKecamatan();
        $kelurahan = AppHelper::getAllKelurahan();
        $pekerjaan = AppHelper::getListPekerjaan();

        return view('data.create-new', compact('kecamatan', 'kelurahan','pekerjaan'));
    }

    private function gabung($data1, $data2)
    {
        $out = [];
        foreach ($data1 as $key => $item) {
            $item = isset($item) ? $item : null;
            foreach ($data2 as $ik => $val) {
                $val = isset($val) ? $val : null;
                if ($key === $ik) {
                    $out[] = ['nama' => $item, 'umur' => $val];
                }

            }
        }

        return $out;

    }

    public function simpanAnggota($data, $input)
    {
        $pesan = "";
        $error = 0;
        $simpan = false;
        $check = Anggota::where('anggotaid', '=', Input::get('nokk'))->exists();
        if (is_array($data)) {
            foreach ($data as $item) {
                if (!$check) {
                    $dataanggota = new Anggota();
                    $dataanggota->anggotaid = $input['nokk'];
                    $dataanggota->nama = $item['nama'];
                    $dataanggota->umur = $item['umur'];
                    $dataanggota->save();
                }
                $simpan = true;
            }

            if ($simpan !== true) {
                $error = 1;
            };

        }

        return $error;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return []
     */
    public function store(Request $request)
    {
        $datakk = new Data();
        $kecamatan = AppHelper::getListKecamatan();
        $kelurahan = AppHelper::getAllKelurahan();

        $validatedData = $request->validate([
            'nokk' => 'required|unique:data|max:20',
            'namakk' => 'required|string|max:150',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
        ]);

        if($validatedData){
            $input = $request->all();

            $datakk->nokk = $input['nokk'];
            $datakk->namakk = $input['namakk'];
            $datakk->alamat = $input['alamat'];
            $datakk->anggotaid = $input['nokk'];
            $datakk->notps = $input['notps'];
            $datakk->kecamatan = $input['kecamatan'];
            $datakk->kelurahan = $input['kelurahan'];
            $datakk->pekerjaan = $input['pekerjaan'];
            $datakk->notelp = $input['notelp'];
            $datakk->status = 1;
            $datakk->save();

            return redirect()->route('data.create')->with('Success','Data berhasil disimpan');
        }

        return view('data.create', compact('kecamatan', 'kelurahan'));
    }

    public function storeAnggota(Request $request){

        return view('data.create', compact('kecamatan', 'kelurahan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Data::find($id);
        $anggota = $data->anggota()->get();
        $kec = Kecamatan::where('id', $data->kecamatan)->first();
        $kel = Kelurahan::where('id_kelurahan', $data->kelurahan)->first();

        return view('data.view', compact('anggota', 'data', 'kec', 'kel','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Data::find($id);
        $kec = Kecamatan::where('id', $data->kecamatan)->where('status', 1)->first();
        $kel = Kelurahan::where('id_kelurahan', $data->kelurahan)->where('status', 1)->get();

        $kecamatan = Kecamatan::pluck('name','id')->toArray();
        $kelurahan = Kelurahan::pluck('name','id_kelurahan')->toArray();

        $anggota = $data->anggota()->get();

        return view('data.edit',['id'=>$id,'data'=>$data,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'anggota'=>$anggota,'kec'=>$kec,'kel'=>$kel]);
    }

    public function updateAnggota($nokk, $out)
    {

        if(is_array($out)){
            foreach ($out as $item) {
                $dataanggota = new Anggota();
                $dataanggota->anggotaid = $nokk;
                $dataanggota->nama = $item['nama'];
                $dataanggota->umur = $item['umur'];
                $dataanggota->status = 1;
                $dataanggota->save();
            }
            return true;
        }
        return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Data::find($id);

        if ($data) {
            $data->nokk = $request->nokk;
            $data->namakk = $request->namakk;
            $data->alamat = $request->alamat;
            $data->anggotaid = $request->nokk;
            $data->notps = $request->notps;
            $data->kecamatan = $request->kecamatan;
            $data->kelurahan = $request->kelurahan;
            $data->pekerjaan = $request->pekerjaan;
            $data->notelp = $request->notelp;
            $data->save();
            return redirect()->route('data.edit',$id)->with('Success','Data berhasil disimpan');
        }
        return redirect()->route('data.edit',$id)->with('Error','Data Gagal disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Data::find($id);

        Anggota::where('anggotaid',$data->nokk)
            ->where('status',1)
            ->delete();

        $data->delete();

        return redirect()->route('data.index')
            ->with('pesan', 'Data berhasil di hapus');
    }

    /**
     * Menampilkan hasil.
     *
     * @return \Illuminate\Http\Response
     */
    public function hasil()
    {
        return view('data.hasil');
    }

    public function getJsonKelurahan($idkec)
    {
        return AppHelper::getJsonKelurahan($idkec);
    }

    public function getJsonKecamatan()
    {
        return AppHelper::getJsonKecamatan();
    }

    public function wilayah()
    {
        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status', 1)->get();
        if (empty($_GET['kec'])) {
            if (empty($_GET['kel'])) {
                $kelurahan = Kelurahan::where('kecamatan_id', 'xdx')->get();
            } else {
                $getkel = Kelurahan::where('id_kelurahan', $_GET['kel'])->where('status', 1)->first();
                $kelurahan = Kelurahan::where('kecamatan_id', $getkel['kecamatan_id'])->where('status', 1)->get();
            }
        } else {
            if (empty($_GET['kel'])) {
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            } else {
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            }
        }

        return view('data.create', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function formulir()
    {
        return view('data.formulir');
    }
}
