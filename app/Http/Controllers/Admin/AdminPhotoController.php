<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 10;
        $data_foto = Photo::orderBy('created_at', 'DESC')->paginate($batas);
        $no = ($batas * ($data_foto->currentpage()-1))+1;
        return view('admin.page.foto.tampil', ['DataFoto' => $data_foto,  'no'=>$no]);
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->katakunci;
        $data_foto = Photo::where('foto','like',"%".$cari."%")->orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data = Photo::where('foto','like',"%".$cari."%")->orderBy('created_at', 'DESC')->count("id_photo");
        $no = ($batas * ($data_foto->currentpage()-1))+1;
        return view('admin.page.foto.cari', ['DataFoto' => $data_foto,'JumlahDataFoto'=>$jumlah_data,'no'=>$no, 'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.foto.tambah');
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
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $foto= new Photo;
        $foto->id_user_created_at = Auth::id();
        $foto->id_user_updated_at = Auth::id();
        $filefoto = $request->foto;
        $namafile = time().'.'.$filefoto->getClientOriginalExtension();
        $filefoto->move('public/foto/',$namafile);
        $foto->foto = $namafile;
        $foto->save();
        return redirect('/admin/foto') ->with('status', 'Data Foto Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_foto = Photo::find($id);
        return view('admin.page.foto.detail', ['DataFoto' => $data_foto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_foto = Photo::find($id);
        return view('admin.page.foto.edit', ['DataFoto' => $data_foto]);
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
            'foto' => 'image|mimes:jpeg,jpg,png',
        ])->validated();

        $data_foto = Photo::find($id);

        $namafileold = $data_foto->foto;
        if($request->has('foto')){
            if(File::exists('public/foto/'.$namafileold)) {
                File::delete('public/foto/'.$namafileold);
            }
            $data_foto->id_user_updated_at = Auth::id();
            $filefoto = $request->foto;
            $namafile = time().'.'.$filefoto->getClientOriginalExtension();
            $filefoto->move('public/foto/',$namafile);
            $data_foto->foto = $namafile;
        }
        $data_foto->update();
        return redirect('/admin/foto')->with('status','Data Foto Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_foto = Photo::find($id);
        $namafile = $data_foto->foto;
        if(File::exists('public/foto/'.$namafile)) {
            File::delete('public/foto/'.$namafile);
        }
        $data_foto->delete();
        return redirect('/admin/foto')->with('status', 'Data Foto Berhasil Dihapus');
    }
}
