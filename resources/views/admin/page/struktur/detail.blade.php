@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-users"></i> 
           Detail Data Struktur</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a 
              href="{{url('/profil')}}">Home</a></li>
              <li class="breadcrumb-item"><a 
              href="{{url('/admin/struktur')}}">Data Struktur</a></li>
              <li class="breadcrumb-item active">Detail Data 
              Struktur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')
<section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="{{url('/admin/struktur')}}" class="btn btn-sm 
                  btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> 
                 Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-users"></i> <strong>Data Struktur<strong></td>
                      </tr>                      
                      <tr>
                        <td><strong>Foto Struktur<strong></td>
                        <td><img 
                    src="{{asset('public/foto_struktur/'.$DataStruktur->foto)}}" 
                    class="img-fluid" width="200px;"></td>
                      </tr>               
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%">{{ $DataStruktur->nama}}</td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Nomor Induk Pegawai (NIP)<strong></td>
                        <td width="80%">{{ $DataStruktur->nip}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Jabatan<strong></td>
                        <td width="80%">{{ $DataStruktur->positions->jabatan}}</td>
                      </tr>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
@endsection
