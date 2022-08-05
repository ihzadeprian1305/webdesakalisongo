<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminNewsController extends Controller
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
        $no = ($batas * ($data_berita->currentpage()-1))+1;
        return view('admin.page.berita.tampil', ['DataBerita' => $data_berita,  'no'=>$no]);
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->katakunci;
        $data_berita = News::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data = News::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->count('id_news');
        $no = ($batas * ($data_berita->currentpage()-1))+1;
        return view('admin.page.berita.cari', ['DataBerita' => $data_berita,'JumlahDataBerita'=>$jumlah_data,'no'=>$no, 'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.berita.tambah');
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
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $berita= new News;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->id_user_created_at = Auth::id();
        $berita->id_user_updated_at = Auth::id();
        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('public/gambar/',$namafile);
        $berita->gambar = $namafile;
        $berita->save();
        return redirect('/admin/berita') ->with('status', 'Data Berita Desa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_berita = News::find($id);
        return view('admin.page.berita.detail', ['DataBerita' => $data_berita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_berita = News::find($id);
        return view('admin.page.berita.edit', ['DataBerita' => $data_berita]);
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
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png',
        ])->validated();

        $data_berita = News::find($id);

        $namafileold = $data_berita->gambar;
        if($request->has('gambar')){
            if(File::exists('public/gambar/'.$namafileold)) {
                File::delete('public/gambar/'.$namafileold);
            }
            $data_berita->judul = $request->judul;
            $data_berita->isi = $request->isi;
            $data_berita->id_user_updated_at = Auth::id();
            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('public/gambar/',$namafile);
            $data_berita->gambar = $namafile;
        }else{
            $data_berita->judul = $request->judul;
            $data_berita->isi = $request->isi;
            $data_berita->id_user_updated_at = Auth::id();
        }
        $data_berita->update();
        return redirect('/admin/berita')->with('status','Data Berita Desa Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_berita = News::find($id);
        $namafile = $data_berita->gambar;
        if(File::exists('public/gambar/'.$namafile)) {
            File::delete('public/gambar/'.$namafile);
        }
        $data_berita->delete();
        return redirect('/admin/berita')->with('status', 'Data Berita Desa Berhasil Dihapus');
    }
}
