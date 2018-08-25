<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Data;
use DataTables;
use App\Common\AppHelper;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the <resource class=""></resource>
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anggota.index')
            ->with('page', (\request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nokk = Data::where('status', 1)->orderBy('created_at', 'desc')->pluck('nokk', 'nokk')->toArray();

        return view('anggota.create', compact('nokk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'nokk' => 'required|max:20',
            'nama' => 'required|string|max:150',
            'umur' => 'numeric',
        ]);

        if ($validatedData) {
            $anggota = new Anggota();
            $anggota->anggotaid = $request->nokk;
            $anggota->nama = $request->nama;
            $anggota->umur = $request->umur;
            $anggota->status = 1;
            $anggota->save();

            flash('Anggota berhasil ditambahkan')->success();
            return redirect()->route('anggota.create');
        }
        flash('Anggota Keluarga gagal ditambahkan')->success();
        return redirect()->route('anggota.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Anggota::where('anggotaid', $id)->get();

        return view('anggota.view', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nokk = Data::where('status', 1)->pluck('namakk', 'nokk')->toArray();
        $data = Anggota::findOrFail($id);

        return view('anggota.edit', compact('data', 'nokk', 'id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Anggota::findOrFail($id);
//        $data->anggotaid = $request->nokk;
        if (!empty($data)) {
            $data->nama = $request->nama;
            $data->umur = $request->umur;
            if ($data->save()) {
                flash('Data anggota '.$request->nama.' berhasil diperbaharui')->success();
                return redirect()->route('anggota.edit', $id);
            }
            flash('Data anggota '.$request->nama.' gagal diperbaharui')->error();
            return redirect()->route('anggota.edit', $id);
        }
        flash('Data anggota '.$request->nama.' tidak ditemukan')->info();
        return redirect()->route('anggota.edit', $id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            Anggota::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('anggota.index')
                ->with('Error', $e->getMessage());
        }

        return redirect()->route('anggota.index')
            ->with('pesan', 'Data berhasil di hapus');
    }

    public function getDataAnggota()
    {
        $data = Anggota::select('*')->latest()->where('status', 1);

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-flat btn-xs bg-green dropdown-toggle"
                    data-toggle="dropdown" aria-expanded="false">
                      <span>Pilih Aksi</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="'.route('anggota.edit', $data->id).'" ><i class="fa fa-edit"></i> Edit</a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-url="'.route('anggota.destroy', ['id' => $data->id])
                    .'" data-target="#modal-hapus" href="#" onclick="pushUrlDelete()" >
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </li>
                    </ul>
                </div>
                ';
            })
            ->editColumn('status', function ($data) {
                return AppHelper::getAktif($data->status);
            })
            ->rawColumns(['action' => 'action'])
            ->make(true);
    }

    public function getListNoKK(Request $request)
    {
        $nokk = Data::select(['nokk','namakk'])->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get()->toArray();
        return json_encode($nokk);
    }
}
