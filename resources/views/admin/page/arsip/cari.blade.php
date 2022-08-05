@extends('admin.layouts.app')
@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-file-alt"></i> Data Arsip Desa</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> Data Arsip Desa</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('main-content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;">
            <i class="fas fa-list-ul"></i> Daftar  Arsip Desa</h3>
            <div class="card-tools">
                <a href="{{url('/admin//arsip.tambah')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah  Arsip Desa</a>
            </div>
        </div>
              <div class="card-body">
              <div class="col-md-12">
                  <form method="get" 
                  action="{{url('/admin//arsip.cari')}}">
                  @csrf
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control"
                         id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                    <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>&nbsp; Search</button></div>
                    </div><!-- .row -->
                  </form>
                </div><br>
                @if($JumlahDataArsip>0)
                
                <div class="col-sm-12">                  
                      <div class="alert alert-success" 
                       role="alert">Ditemukan {{ $JumlahDataArsip }} data dengan kata kunci : {{ $cari }}
                      </div>
                </div>
              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="40%">Judul</th>
                        <th width="20%">Dibuat Pada</th>
                        <th width="20%">Diubah Pada</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @if (!empty($DataArsip))
                    @foreach($DataArsip as $key => $Archive)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{Str::limit($Archive->judul, 20, '...')}}</td>
                        <td>{{ $Archive->created_at }}</td>
                        <td>{{ $Archive->updated_at }}</td>
                        <td align="center">
                         <form action="{{url('/admin//arsip.'.$Archive->id_archive)}}" method="Post" onsubmit="return confirm('Apakah Data Arsip {{$Archive->judul}} Ingin Dihapus?')">
                          @csrf
                        <a href="{{url('/admin//arsip.'.$Archive->id_archive.'.detail')}}" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                          
                       <a href="{{url('/admin//arsip.'.$Archive->id_archive.'.edit')}}" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>   
                       <input type="hidden" value="DELETE" name="_method">
                       <button type="submit" class="btn btn-xs btn-info" title="Hapus"><i class="fas fa-trash"></i></button> 
                          </form>                        
                        </td>
                      </tr>
                      @php
                      $no++
                      @endphp

                    @endforeach
                    @else
                    <tr><td colspan="5">Belum Ada Data Arsip
                    </td></tr>
                    @endif
                    </tbody>
                  </table> 
                  @else
                  <div class="col-sm-12">                  
                      <div class="alert alert-danger" 
                       role="alert">Data dengan Kata Kunci : {{ $cari }} Tidak Ditemukan,   
                        <a href="{{url('/admin//arsip')}}"><input 
                        type="button" value="Klik Disini Untuk Kembali" class="btn btn-default"/></a>
                      </div>
                  @endif 
              </div>
              <!-- /.card-body -->
              <!-- <div></div> -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                {{ $DataArsip->links() }}
                </ul>
              </div>
            </div>
            <!-- /.card -->

</section>
<!-- /.content -->
@endsection
