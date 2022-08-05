<?php

namespace App\Http\Controllers\User;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 10;
        $data_berita = News::orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data = News::orderBy('created_at', 'DESC')->count('id_news');
        return view('berita.tampil', ['DataBerita' => $data_berita,'JumlahDataBerita'=>$jumlah_data]);
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->katakunci;
        $data_berita = News::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data = News::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->count('id_news');
        $no = ($batas * ($data_berita->currentpage()-1))+1;
        return view('berita.cari', ['DataBerita' => $data_berita,'JumlahDataBerita'=>$jumlah_data,'no'=>$no, 'cari'=>$cari]);
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
        $batas = 3;
        $data_berita = News::find($id);
        $data_berita_terbaru = News::orderBy('created_at', 'DESC')->paginate($batas);
        return view('berita.detail', ['DataBerita' => $data_berita, 'DataBeritaTerbaru' => $data_berita_terbaru]);
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
