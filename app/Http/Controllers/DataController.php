<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Data;
use App\Wilayah;
use App\Kecamatan;
use App\Kelurahan;
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
        $data = Data::where('status',1)->get();
        return view('data.index', compact('data'));
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
        $kecamatan = $this->getListKecamatan();
        $kelurahan = $this->getAllKelurahan();

        return view('data.create',compact('kecamatan','kelurahan'));
    }

    private function gabung($data1,$data2)
    {
        $out = [];
        foreach ($data1 as $key => $item) {
            foreach ($data2 as $ik => $val) {
                if($key === $ik){
                    $out[] = ['nama'=>$item,'umur'=>$val];
                }

            }
        }

        return array_filter($out);

    }

    public function simpanAnggota($data,$input)
    {
        $pesan = "";
        $error = 0;
        $simpan = false;
        $check = Anggota::where('anggotaid','=',Input::get('nokk'))->exists();
        if(is_array($data)){
            foreach ($data as $item) {
                if(!$check){
                    $dataanggota = new Anggota();
                    $dataanggota->anggotaid = $input['nokk'];
                    $dataanggota->nama = $item['nama'];
                    $dataanggota->umur = $item['umur'];
                    $dataanggota->save();
                }
                $simpan = true;
            }

            if($simpan !== true){
                $error = 1;
            };

        }
        
        return $error;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return []
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nokk' => 'required|unique:data|max:20',
            'namakk' => 'required|string|max:150',
            'anggotaid'=>'max:20',
            'umur' =>'number|max:2',
            'kecamatan'=>'required',
            'kelurahan'=>'required'
        ]);


        $error = 0;
        $pesan = "";
        $ret = [];
        $datakk = new Data();

        $input = $request->all();
        $anggota = $input['anggota']['nama'];
        $umur = $input['anggota']['umur'];
        $nokk = $input['nokk'];

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

        $out = $this->gabung($anggota, $umur);
        $out = array_map('array_filter', $out);
        $out = array_filter($out);
//        dd($out);
        $check = Anggota::where('anggotaid','=',Input::get('nokk'))->exists();

        foreach ($out as $item) {
            if(!$check){
                $dataanggota = new Anggota();
                $dataanggota->anggotaid = $input['nokk'];
                $dataanggota->nama = $item['nama'];
                $dataanggota->umur = $item['umur'];
                $dataanggota->status = 1;
                $dataanggota->save();
            }
        }

        $checknokk = Data::where('nokk','=',Input::get('nokk'))->exists();

        if(!$checknokk){
            $error = 0;
            $pesan = "Data berhasil disimpan";
            $datakk->save();
        }else{
            $error = 1;
            $pesan = "Data sudah ada dalam database";
        }

        $kecamatan = $this->getListKecamatan();
        $kelurahan = $this->getAllKelurahan();

        $ret = ['err'=>$error,'pesan'=>$pesan];

        return view('data.create',compact('ret','kecamatan','kelurahan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Data::where('id',$id)->first();
        $kec = Kecamatan::where('id',$data->kecamatan)->first();
        $kel = Kelurahan::where('id_kelurahan',$data->kelurahan)->first();

        if($data){
            $anggota = Anggota::where('anggotaid',$data->nokk)->get();
        }
        return view('data.view',compact('anggota','data','kec','kel'));
    }

    public function getAllKelurahan(){
        if(empty($_GET['kec'])){
            if(empty($_GET['kel'])){
                $kelurahan = Kelurahan::where('kecamatan_id', 'xdx')->get();
            }else{
                $getkel = Kelurahan::where('id_kelurahan', $_GET['kel'])->where('status', 1)->first();
                $kelurahan = Kelurahan::where('kecamatan_id', $getkel['kecamatan_id'])->where('status', 1)->get();
            }
        }else{
            if(empty($_GET['kel'])){
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            }else{
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            }
        }

        return $kelurahan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$comment = App\Post::find(1)->comments()->where('title', 'foo')->first();
        $data = Data::with(['anggota'])->find($id);
        //$anggota = Data::find($id)->anggota()->where('anggotaid',$data->anggotaid)->get();
//        dd($data);
        $kec = Kecamatan::where('id',$data->kecamatan)->where('status',1)->first();
        $kel = Kelurahan::where('id_kelurahan',$data->kelurahan)->where('status',1)->get();
        $anggota = Anggota::where('anggotaid',$data->anggotaid)->where('status',1)->get();
        $kecamatan = $this->getListKecamatan();

        //$kecamatan = Kecamatan::where('kota_id', '7313')->where('status',1)->get();
        $kelurahan = $this->getAllKelurahan();

        return view('data.edit',compact('data','kecamatan','kelurahan','anggota','kec','kel','id'));
    }

    public function updateAnggota($nokk, $out){

        foreach ($out as $item) {
//            $dataanggota = Anggota::find($nokk);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $anggota = $input['anggota']['nama'];
        $umur = $input['anggota']['umur'];
        $nokk = $input['nokk'];

        $data = Data::find($id);
        if($data){
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
            if($updateAnggota){
                $data->save();
                $error = 0;
                $pesan = "Data anggota telah diupdate";
                return redirect()->route('data.edit',$id)->with(['err'=>$error,'pesan'=>$pesan]);
            }else{
                $error = 1;
                $pesan = "Data anggota Gagal diupdate";
                return redirect()->route('data.edit',$id)->with(['err'=>$error,'pesan'=>$pesan]);
            }
            //dd($updateAnggota);
        }
        $error = 2;
        $pesan = "Data tidak ditemukan";
        return redirect()->route('data.edit',$id)->with(['err'=>$error,'pesan'=>$pesan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Data::find($id)->delete();
       Data::where('id',$id)
           ->where('status',1)
           ->update(['status'=>0]);


       return redirect()->route('data.index')
            ->with('success','Data deleted successfully');
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

    public function getListKecamatan()
    {
        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status',1)->get();
        return $kecamatan;
    }
    public function getListKelurahan($kec)
    {
        $data = Kelurahan::where('kecamatan_id',$kec)->where('status',1)->get();
        return $data;
    }

//    public function getListKelurahan(Request $request)
//    {
//        $req = $request->get('id');
//         if($req)
////            $data = Wilayah::where('kecamatan','=',$req)->get();
//            $kelurahan = Kelurahan::where('kecamatan_id', $getkel['kecamatan_id'])->where('status', 1)->get();
//
//        return response()->json($kelurahan);
//    }

    public function getJsonKelurahan($idkec){
        $kelurahan = Kelurahan::where('kecamatan_id', $idkec)->where('status', 1)->get();
        return json_encode($kelurahan);
    }

    public function getJsonKecamatan(){
        return json_encode($this->getListKecamatan());
    }

    public function wilayah()
    {
        $kecamatan = Kecamatan::where('kota_id', '7313')->where('status',1)->get();
        if(empty($_GET['kec'])){
            if(empty($_GET['kel'])){
                $kelurahan = Kelurahan::where('kecamatan_id', 'xdx')->get();
            }else{
                $getkel = Kelurahan::where('id_kelurahan', $_GET['kel'])->where('status', 1)->first();
                $kelurahan = Kelurahan::where('kecamatan_id', $getkel['kecamatan_id'])->where('status', 1)->get();
            }
        }else{
            if(empty($_GET['kel'])){
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            }else{
                $kelurahan = Kelurahan::where('kecamatan_id', $_GET['kec'])->where('status', 1)->get();
            }
        }

        return view('data.create', ['kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan]);
    }
}
