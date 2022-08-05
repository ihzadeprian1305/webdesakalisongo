<?php

namespace App\Http\Controllers\User;

use App\Models\News;
use App\Models\Photo;
use App\Models\Archive;
use App\Models\Structure;
use Illuminate\Http\Request;
use App\Models\CriticAndSuggestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 3;
        $batas_foto = 6;
        $data_berita = News::orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data_berita = News::orderBy('created_at', 'DESC')->count('id_news');
        $data_arsip = Archive::orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data_arsip = Archive::orderBy('created_at', 'DESC')->count('id_archive');
        $data_foto = Photo::orderBy('created_at', 'DESC')->paginate($batas_foto);
        $jumlah_data_foto = Photo::orderBy('created_at', 'DESC')->count('id_photo');
        $data_struktur_kepala_desa = Structure::where('id_position','=',1)->orderBy('nama')->paginate(1);
        $data_struktur_sekretaris_desa = Structure::where('id_position','=',2)->orderBy('nama')->paginate(1);
        $data_struktur_kepala_urusan = Structure::where('id_position','>=',3)->where('id_position','<=',5)->orderBy('nama')->paginate(3);
        return view('home', ['DataBerita' => $data_berita, 'JumlahDataBerita' => $jumlah_data_berita, 'DataArsip' => $data_arsip, 'JumlahDataArsip' => $jumlah_data_arsip, 'DataFoto' => $data_foto, 'JumlahDataFoto' => $jumlah_data_foto, 'DataStrukturKepalaDesa' => $data_struktur_kepala_desa, 'DataStrukturSekretarisDesa' => $data_struktur_sekretaris_desa, 'DataStrukturKepalaUrusan' => $data_struktur_kepala_urusan]);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'subjek' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ])->validated();

        $kritikdansaran = new CriticAndSuggestion;
        $kritikdansaran->nama = $request->nama;
        $kritikdansaran->subjek = $request->subjek;
        $kritikdansaran->email = $request->email;
        $kritikdansaran->pesan = $request->pesan;
        $kritikdansaran->save();
        return redirect('/') ->with('status', 'Kritik dan Saran Berhasil Dikirim');
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
