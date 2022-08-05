<?php

namespace App\Http\Controllers\User;

use App\Models\Archive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserArchiveController extends Controller
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
        $jumlah_data = Archive::orderBy('created_at', 'DESC')->count('id_archive');
        return view('arsip.tampil', ['DataArsip' => $data_arsip,'JumlahDataArsip'=>$jumlah_data]);
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->katakunci;
        $data_arsip = Archive::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->paginate($batas);
        $jumlah_data = Archive::where('judul','like',"%".$cari."%")->orderBy('created_at', 'DESC')->count('id_archive');
        $no = ($batas * ($data_arsip->currentpage()-1))+1;
        return view('arsip.cari', ['DataArsip' => $data_arsip,'JumlahDataArsip'=>$jumlah_data,'no'=>$no, 'cari'=>$cari]);
    }

    public function download($file_name) {
        $file_path = 'public/file/'.$file_name;
        $headers = ['Content-Type: application/pdf'];
        $newName = 'arsip-desakalisongo-pdf-'.time().'.pdf';
        return response()->download($file_path, $newName, $headers);
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
        $data_arsip = Archive::find($id);
        $data_arsip_terbaru = Archive::orderBy('created_at', 'DESC')->paginate($batas);
        return view('arsip.detail', ['DataArsip' => $data_arsip, 'DataArsipTerbaru' => $data_arsip_terbaru]);
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
