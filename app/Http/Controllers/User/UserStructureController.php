<?php

namespace App\Http\Controllers\User;

use App\Models\Structure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_struktur_kepala_desa = Structure::where('id_position','=',1)->orderBy('nama')->paginate(1);
        $data_struktur_sekretaris_desa = Structure::where('id_position','=',2)->orderBy('nama')->paginate(1);
        $data_struktur_kepala_urusan = Structure::where('id_position','>=',3)->where('id_position','<=',5)->orderBy('nama')->paginate(3);
        $data_struktur_kepala_seksi = Structure::where('id_position','>=',6)->where('id_position','<=',8)->orderBy('nama')->paginate(3);
        $data_struktur_kepala_dusun = Structure::where('id_position','>=',9)->where('id_position','<=',12)->orderBy('nama')->paginate(3);
        $data_struktur_pegawai = Structure::where('id_position','=',13)->orderBy('nama')->paginate(100);
        return view('struktur.tampil', ['DataStrukturKepalaDesa' => $data_struktur_kepala_desa, 'DataStrukturSekretarisDesa' => $data_struktur_sekretaris_desa, 'DataStrukturKepalaUrusan' => $data_struktur_kepala_urusan, 'DataStrukturKepalaSeksi' => $data_struktur_kepala_seksi, 'DataStrukturKepalaDusun' => $data_struktur_kepala_dusun, 'DataStrukturPegawai' => $data_struktur_pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
