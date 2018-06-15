<?php

namespace App\Http\Controllers;

use App\Common\AppHelper;
use App\Models\Anggota;
use App\Models\Data;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use DataTables;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::latest()->where('status', 1);
        $count = $data->count();
        $data = $data->paginate(20);
        return view('data.index', compact('data','count'))
            ->with('i', (\request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = AppHelper::getSelectKecamatan();
        $kelurahan = AppHelper::getAllKelurahan();
        $pekerjaan = AppHelper::getListPekerjaan();

        return view('data.create', compact('kecamatan', 'kelurahan','pekerjaan'));
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

        $request->validate([
            'nokk' => 'required|unique:data|max:20',
            'namakk' => 'required|string|max:150',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
        ]);

        $input = $request->all();
        $datakk->nokk = $input['nokk'];
        $datakk->namakk = $input['namakk'];
        $datakk->alamat = $input['alamat'];
        $datakk->anggotaid = $input['nokk'];
        $datakk->notps = $input['notps'];
        $datakk->kecamatan = $input['kecamatan'];
        $datakk->kelurahan = $input['kelurahan'];
        $datakk->pekerjaan = !empty($input['pekerjaan']) ? $input['pekerjaan'] : 1;
        $datakk->notelp = $input['notelp'];
        $datakk->status = 1;

        if($datakk->save())
            return redirect()->route('data.create')->with('Success','Data berhasil disimpan');
        else
            return redirect()->route('data.create')->with('Error','Data Gagal Tersimpan');
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
        $pekerjaan = AppHelper::getListPekerjaan();

        $anggota = $data->anggota()->get();

        return view('data.edit',['id'=>$id,'data'=>$data,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'anggota'=>$anggota,'kec'=>$kec,'kel'=>$kel,'pekerjaan'=>$pekerjaan]);
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
            Anggota::where('anggotaid',$data->nokk)->update(['anggotaid'=>$request->nokk]);
            $data->nokk = $request->nokk;
            $data->namakk = $request->namakk;
            $data->alamat = $request->alamat;
            $data->anggotaid = $request->nokk;
            $data->notps = $request->notps;
            $data->kecamatan = $request->kecamatan;
            $data->kelurahan = $request->kelurahan;
            $data->pekerjaan = $request->pekerjaan;
            $data->notelp = $request->notelp;
            //dd($anggota);
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

    public function getJsonKelurahan($idkec)
    {
        return AppHelper::getJsonKelurahan($idkec);
    }

    public function getJsonKecamatan()
    {
        return AppHelper::getJsonKecamatan();
    }

    public function getDatatable(){
        $data = Data::select('*')->latest()->where('status',1);
//        $data = Data::query();
        return Datatables::of($data)
            ->addColumn('edit', function ($data) {
                return '<a href="'.route('data.edit',$data->id).'" class="btn btn-xs bg-blue"><i class="fa fa-edit"></i> Edit</a>';
            })
            ->editColumn('delete', function ($data) {
                return '
                <form method="post" action="'.route("data.destroy", $data->id).'" style="display:inline">
                    '.csrf_field().'     
                    <input type="hidden" name="_method" value="DELETE">                                         
                    <button type="submit" href="'.route('data.destroy',$data->id).'" class="btn btn-xs bg-red"><i class="fa fa-trash"></i> Hapus</button>
                </form>
                ';
            })
            ->rawColumns(['delete' => 'delete','edit' => 'edit'])
            ->editColumn('kecamatan',function ($data){
                return AppHelper::getKecamatanName($data->kecamatan);
            })
            ->editColumn('kelurahan',function($data){
                return AppHelper::getKelurahanName($data->kelurahan);
            })
            ->editColumn('pekerjaan',function($data){
                return AppHelper::getPekerjaanName($data->pekerjaan);
            })
            ->make(true);

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

}
