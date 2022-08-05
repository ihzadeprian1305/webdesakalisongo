<?php

namespace App\Http\Controllers\Admin;

use App\Models\Structure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 10;
        $data_struktur = Structure::orderBy('nama')->paginate($batas);
        $no = ($batas * ($data_struktur->currentpage()-1))+1;
        return view('admin.page.struktur.tampil', ['DataStruktur' => $data_struktur,  'no'=>$no]);
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->katakunci;
        $data_struktur = Structure::where('nama','like',"%".$cari."%")->orderBy('nama')->paginate($batas);
        $jumlah_data = Structure::where('nama','like',"%".$cari."%")->orderBy('nama')->count("id_structure");
        $no = ($batas * ($data_struktur->currentpage()-1))+1;
        return view('admin.page.struktur.cari', ['DataStruktur' => $data_struktur,'JumlahDataStruktur'=>$jumlah_data,'no'=>$no, 'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_jabatan = Position::orderBy('jabatan','asc')->get();
        return view('admin.page.struktur.tambah',['DataJabatan' => $data_jabatan]);
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
            'nip' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $struktur = new Structure;
        $struktur->nama = $request->nama;
        $struktur->nip = $request->nip;
        $struktur->id_position = $request->jabatan;
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('public/foto_struktur/',$namafile);
        $struktur->foto = $namafile;
        $struktur->save();
        return redirect('/admin/struktur') ->with('status', 'Data Struktur Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_struktur = Structure::find($id);
        return view('admin.page.struktur.detail', ['DataStruktur' => $data_struktur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_struktur = Structure::find($id);
        $data_jabatan = Position::orderBy('jabatan','asc')->get();
        return view('admin.page.struktur.edit', ['DataStruktur' => $data_struktur, 'DataJabatan' => $data_jabatan]);
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
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png',
        ])->validated();

        $data_struktur = Structure::find($id);

        $namafileold = $data_struktur->foto;
        if($request->has('foto')){
            if(File::exists('public/foto_struktur/'.$namafileold)) {
                File::delete('public/foto_struktur/'.$namafileold);
            }
            $data_struktur->nama = $request->nama;
            $data_struktur->nip = $request->nip;
            $data_struktur->id_position = $request->jabatan;
            $foto = $request->foto;
            $namafile = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('public/foto_struktur/',$namafile);
            $data_struktur->foto = $namafile;
        }else{
            $data_struktur->nama = $request->nama;
            $data_struktur->nip = $request->nip;
            $data_struktur->id_position = $request->jabatan;
        }
        $data_struktur->update();
        return redirect('/admin/struktur')->with('status','Data Struktur Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_struktur = Structure::find($id);
        $namafile = $data_struktur->foto;
        if(File::exists('public/foto_struktur/'.$namafile)) {
            File::delete('public/foto_struktur/'.$namafile);
        }
        $data_struktur->delete();
        return redirect('/admin/struktur')->with('status', 'Data Struktur Berhasil Dihapus');
    }
}
