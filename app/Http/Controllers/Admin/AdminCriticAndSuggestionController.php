<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriticAndSuggestion;
use Illuminate\Http\Request;

class AdminCriticAndSuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 10;
        $data_kritikdansaran = CriticAndSuggestion::orderBy('created_at', 'DESC')->paginate($batas);
        $no = ($batas * ($data_kritikdansaran->currentpage()-1))+1;
        return view('admin.page.kritikdansaran.tampil', ['DataKritikDanSaran' => $data_kritikdansaran,  'no'=>$no]);
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->katakunci;
        $data_kritikdansaran = CriticAndSuggestion::where('subjek','like',"%".$cari."%")->orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data = CriticAndSuggestion::where('subjek','like',"%".$cari."%")->orderBy('created_at', 'DESC')->count('id_criticandsuggestion');
        $no = ($batas * ($data_kritikdansaran->currentpage()-1))+1;
        return view('admin.page.kritikdansaran.cari', ['DataKritikDanSaran' => $data_kritikdansaran,'JumlahDataKritikDanSaran'=>$jumlah_data,'no'=>$no, 'cari'=>$cari]);
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
        $data_kritikdansaran = CriticAndSuggestion::find($id);
        return view('admin.page.kritikdansaran.detail', ['DataKritikDanSaran' => $data_kritikdansaran]);
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
        $data_kritikdansaran = CriticAndSuggestion::find($id);
        $data_kritikdansaran->delete();
        return redirect('/admin/kritikdansaran')->with('status', 'Data Kritik dan Saran Berhasil Dihapus');
    }
}
