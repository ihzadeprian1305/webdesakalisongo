@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-comment"></i> 
           Detail Data Kritik dan Saran</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a 
              href="{{url('/profil')}}">Home</a></li>
              <li class="breadcrumb-item"><a 
              href="{{url('/admin/kritikdansaran')}}">Data Kritik dan Saran</a></li>
              <li class="breadcrumb-item active">Detail Data Kritik dan Saran</li>
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
                  <a href="{{url('/admin/kritikdansaran')}}" class="btn btn-sm 
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
                        <td colspan="2"><i class="fas fa-comment"></i> <strong>Data Kritik dan Saran<strong></td>
                      </tr>                      
                      <tr>
                        <td width="20%"><strong>Subjek<strong></td>
                        <td width="80%">{{ $DataKritikDanSaran->subjek}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Pengirim<strong></td>
                        <td width="80%">{{ $DataKritikDanSaran->nama}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Email Pengirim<strong></td>
                        <td width="80%">{{ $DataKritikDanSaran->email}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Dibuat Pada<strong></td>
                        <td width="80%">{{ $DataKritikDanSaran->created_at}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Pesan<strong></td>
                        <td width="80%">{{ $DataKritikDanSaran->pesan}}</td>
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
