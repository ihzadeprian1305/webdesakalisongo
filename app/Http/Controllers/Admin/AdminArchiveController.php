<?php

namespace App\Http\Controllers\Admin;

use App\Models\Archive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 10;
        $data_arsip = Archive::orderBy('created_at', 'DESC')->paginate($batas);
        $no = ($batas * ($data_arsip->currentpage()-1))+1;
        return view('admin.page.arsip.tampil', ['DataArsip' => $data_arsip,  'no'=>$no]);
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->katakunci;
        $data_arsip = Archive::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data = Archive::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->count("id_archive");
        $no = ($batas * ($data_arsip->currentpage()-1))+1;
        return view('admin.page.arsip.cari', ['DataArsip' => $data_arsip,'JumlahDataArsip'=>$jumlah_data,'no'=>$no, 'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.arsip.tambah');
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
            'cover' => 'required|image|mimes:jpeg,jpg,png',
            'judul' => 'required',
            'file' => 'required|mimes:pdf',
        ])->validated();

        $arsip= new Archive();
        $arsip->judul = $request->judul;
        $arsip->id_user_created_at = Auth::id();
        $arsip->id_user_updated_at = Auth::id();
        $cover = $request->cover;
        $namacover = time().'.'.$cover->getClientOriginalExtension();
        $cover->move('public/cover/',$namacover);
        $arsip->cover = $namacover;
        $file = $request->file;
        $namafile = time().'.'.$file->getClientOriginalExtension();
        $file->move('public/file/',$namafile);
        $arsip->file = $namafile;
        $arsip->save();
        return redirect('/admin/arsip') ->with('status', 'Data Arsip Desa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_arsip = Archive::find($id);
        return view('admin.page.arsip.detail', ['DataArsip' => $data_arsip]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_arsip = Archive::find($id);
        return view('admin.page.arsip.edit', ['DataArsip' => $data_arsip]);
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
            'cover' => 'image|mimes:jpeg,jpg,png',
            'judul' => 'required',
            'file' => 'mimes:pdf',
        ])->validated();

        $data_arsip = Archive::find($id);

        $namacoverold = $data_arsip->cover;
        $namafileold = $data_arsip->file;
        if($request->has('cover')){
            if(File::exists('public/cover/'.$namacoverold)) {
                File::delete('public/cover/'.$namacoverold);
            }
            $data_arsip->judul = $request->judul;
            $data_arsip->id_user_updated_at = Auth::id();
            $cover = $request->cover;
            $namacover = time().'.'.$cover->getClientOriginalExtension();
            $cover->move('public/cover/',$namacover);
            $data_arsip->cover = $namacover;
        }else if($request->has('file')){
            if(File::exists('public/file/'.$namafileold)) {
                File::delete('public/file/'.$namafileold);
            }
            $data_arsip->judul = $request->judul;
            $data_arsip->id_user_updated_at = Auth::id();
            $file = $request->file;
            $namafile = time().'.'.$file->getClientOriginalExtension();
            $file->move('public/file/',$namafile);
            $data_arsip->file = $namafile;
        }else if($request->has('cover') && $request->has('file')){
            if(File::exists('public/cover/'.$namacoverold)) {
                File::delete('public/cover/'.$namacoverold);
            }
            if(File::exists('public/file/'.$namafileold)) {
                File::delete('public/file/'.$namafileold);
            }
            $data_arsip->judul = $request->judul;
            $data_arsip->id_user_updated_at = Auth::id();
            $cover = $request->cover;
            $namacover = time().'.'.$cover->getClientOriginalExtension();
            $cover->move('public/cover/',$namacover);
            $data_arsip->cover = $namacover;
            $file = $request->file;
            $namafile = time().'.'.$file->getClientOriginalExtension();
            $file->move('public/file/',$namafile);
            $data_arsip->file = $namafile;
        }else{
            $data_arsip->judul = $request->judul;
            $data_arsip->id_user_updated_at = Auth::id();
        }
        $data_arsip->update();
        return redirect('/admin/arsip')->with('status','Data Arsip Desa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_arsip = Archive::find($id);
        $namacover = $data_arsip->cover;
        if(File::exists('public/cover/'.$namacover)) {
            File::delete('public/cover/'.$namacover);
        }
        $namafile = $data_arsip->file;
        if(File::exists('public/file/'.$namafile)) {
            File::delete('public/file/'.$namafile);
        }
        $data_arsip->delete();
        return redirect('/admin/arsip')->with('status', 'Data Arsip Desa Berhasil Dihapus');
    }
}
