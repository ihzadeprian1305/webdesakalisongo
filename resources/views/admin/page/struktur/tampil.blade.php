@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-users"></i> Data Struktur</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data Struktur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
<!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;">
                <i class="fas fa-list-ul"></i> Daftar  Struktur</h3>
                <div class="card-tools">
                  <a href="{{ url('/admin/struktur.tambah') }}" 
                  class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  Struktur</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="get" 
                  action="{{url('/admin/struktur.cari')}}">
                  @csrf
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
                @if (session('status'))
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                    {!! session()->get('status') !!}</div>
                </div>
              @endif
              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Nama</th>
                        <th width="25%">Nomor Induk Pegawai (NIP)</th>
                        <th width="25%">Jabatan</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @if (!empty($DataStruktur))
                    @foreach($DataStruktur as $key => $Structure)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $Structure->nama }}</td>
                        <td>{{ $Structure->nip }}</td>
                        <td>{{ $Structure->positions->jabatan }}</td>
                        <td align="center">
                         <form action="{{url('/admin/struktur.'.$Structure->id_structure)}}" method="Post" onsubmit="return confirm('Apakah Data Struktur dengan Nama {{$Structure->nama}} Ingin Dihapus?')">
                          @csrf
                   <a href="{{url('/admin/struktur.'.$Structure->id_structure.'.detail')}}" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                          
                   <a href="{{url('/admin/struktur.'.$Structure->id_structure.'.edit')}}" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                          
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
                    <tr><td colspan="5">Belum Ada Data Struktur
                    </td></tr>
                    @endif
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <!-- <div></div> -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 
                 float-right">
                {{ $DataStruktur->links() }}
                </ul>
              </div>
            </div>
            <!-- /.card -->

</section>
<!-- /.content -->
@endsection
