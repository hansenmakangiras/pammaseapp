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

        return view('data.index', compact('data','trashed'));
//        $data = Data::latest()->paginate(10);
//        return view('data.index', compact('data'))
//            ->with('i', (\request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = AppHelper::getListKecamatan();
        $kelurahan = AppHelper::getAllKelurahan();

        return view('data.create', compact('kecamatan', 'kelurahan'));
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
            'anggotaid' => 'unique:anggota|max:20',
            'umur' => 'number|max:2',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
        ]);

        if($validatedData){
            $input = $request->all();
            $anggota = $input['anggota']['nama'];
            $umur = $input['anggota']['umur'];

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

            $out = $this->gabung($anggota, $umur);
            $out = array_map('array_filter', $out);
            $out = array_filter($out);

            foreach ($out as $item) {
                    $dataanggota = new Anggota();
                    $dataanggota->anggotaid = $input['nokk'];
                    $dataanggota->nama = isset($item['nama']) ? $item['nama'] : null;
                    $dataanggota->umur = isset($item['umur']) ? $item['umur'] : null;
                    $dataanggota->status = 1;
                    $dataanggota->save();
            }

            return redirect()->route('data.create')->with('Success','Data berhasil disimpan');
        }

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
        $data = Data::where('id', $id)->first();
        $kec = Kecamatan::where('id', $data->kecamatan)->first();
        $kel = Kelurahan::where('id_kelurahan', $data->kelurahan)->first();

        if ($data) {
            $anggota = Anggota::where('anggotaid', $data->nokk)->get();
        }

        return view('data.view', compact('anggota', 'data', 'kec', 'kel'));
    }

//    public function getAllKelurahan()
//    {
//        if (empty($_GET['kec'])) {
//            if (empty($_GET['kel'])) {
//                $kelurahan = Kelurahan::where('kecamatan_id', 'xdx')->get();
//            } else {
//                $getkel = Kelurahan::where('id_kelurahan', $_GET['kel'])->where('status', 1)->first();
//                $kelurahan = Kelurahan::where('kecamatan_id', $getkel['kecamatan_id'])->where('status', 1)->get();
//            }
//        } else {
//            if (empty($_GET['kel'])) {
//                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
//            } else {
//                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
//            }
//        }
//
//        return $kelurahan;
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Data::with(['anggota'])->find($id);
        $kec = Kecamatan::where('id', $data->kecamatan)->where('status', 1)->first();
        $kel = Kelurahan::where('id_kelurahan', $data->kelurahan)->where('status', 1)->get();
        $anggota = Anggota::where('anggotaid', $data->anggotaid)->where('status', 1)->get();
        $kecamatan = $this->getListKecamatan();

        $kelurahan = $this->getAllKelurahan();

        return view('data.edit', compact('data', 'kecamatan', 'kelurahan', 'anggota', 'kec', 'kel', 'id'));
    }

    public function updateAnggota($nokk, $out)
    {

        foreach ($out as $item) {
            $dataanggota = new Anggota();
            $dataanggota->anggotaid = $nokk;
            $dataanggota->nama = $item['nama'];
            $dataanggota->umur = $item['umur'];
            $dataanggota->save();
        }

        //dd($dataanggota);
        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $anggota = $input['anggota']['nama'];
        $umur = $input['anggota']['umur'];
        $nokk = $input['nokk'];

        $data = Data::find($id);
        if ($data) {
            $data->nokk = $nokk;
            $data->namakk = $input['namakk'];
            $data->alamat = $input['alamat'];
            $data->anggotaid = $input['nokk'];
            $data->notps = $input['notps'];
            $data->kecamatan = $input['kecamatan'];
            $data->kelurahan = $input['kelurahan'];
            $data->pekerjaan = $input['pekerjaan'];
            $data->notelp = $input['notelp'];
            //$data->save();

            $out = $this->gabung($anggota, $umur);
            $updateAnggota = $this->updateAnggota($nokk, $out);
//            dd($updateAnggota);
            if ($updateAnggota) {
                $data->save();
                $error = 0;
                $pesan = "Data anggota telah diupdate";

                return redirect()->route('data.edit', $id)->with(['err' => $error, 'pesan' => $pesan]);
            } else {
                $error = 1;
                $pesan = "Data anggota Gagal diupdate";

                return redirect()->route('data.edit', $id)->with(['err' => $error, 'pesan' => $pesan]);
            }
            //dd($updateAnggota);
        }
        $error = 2;
        $pesan = "Data tidak ditemukan";

        return redirect()->route('data.edit', $id)->with(['err' => $error, 'pesan' => $pesan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Data::where('anggotaid', $id)
            ->where('status', 1)
            ->delete();
//            ->update(['status' => 0]);

        Anggota::where('anggotaid',$id)
            ->where('status',1)
            ->delete();
//            ->update(['status' => 0]);

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

//    public function getListKecamatan()
//    {
//        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status', 1)->get();
//
//        return $kecamatan;
//    }
//
//    public function getListKelurahan($kec)
//    {
//        $data = Kelurahan::where('kecamatan_id', $kec)->where('status', 1)->get();
//
//        return $data;
//    }
//
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
