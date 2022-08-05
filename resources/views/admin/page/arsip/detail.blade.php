@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-file-alt"></i> 
           Detail Data Archive Desa</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a 
              href="{{url('/profil')}}">Home</a></li>
              <li class="breadcrumb-item"><a 
              href="{{url('/admin/arsip')}}">Data Arsip Desa</a></li>
              <li class="breadcrumb-item active">Detail Data Arsip Desa</li>
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
                  <a href="{{url('/admin/arsip')}}" class="btn btn-sm 
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
                        <td colspan="2"><i class="fas fa-file-alt"></i> <strong>Data Arsip Desa<strong></td>
                      </tr>            
                      <tr>
                        <td><strong>Cover<strong></td>
                        <td><img src="{{asset('public/cover/'.$DataArsip->cover)}}" class="img-fluid" width="200px;"></td>
                      </tr>                        
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%">{{ $DataArsip->judul}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Dibuat Oleh<strong></td>
                        <td width="80%">{{ $DataArsip->users_created_at->name}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Dibuat Pada<strong></td>
                        <td width="80%">{{ $DataArsip->created_at}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Diubah Oleh<strong></td>
                        <td width="80%">{{ $DataArsip->users_updated_at->name}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Diubah Pada<strong></td>
                        <td width="80%">{{ $DataArsip->updated_at}}</td>
                      </tr>
                      <tr>
                        <td><strong>File<strong></td>
                        <td>
                          <iframe
                            width="640"
                            height="480"
                            src="{{asset('public/file/'.$DataArsip->file)}}"
                          >
                          </iframe>
                        </td>
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
