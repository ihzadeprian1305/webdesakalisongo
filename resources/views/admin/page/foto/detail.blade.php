@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-image"></i> 
           Detail Data Foto</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a 
              href="{{url('/admin/profil')}}">Home</a></li>
              <li class="breadcrumb-item"><a 
              href="{{url('/admin/foto')}}">Data Foto</a></li>
              <li class="breadcrumb-item active">Detail Data Foto</li>
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
                  <a href="{{url('/admin/foto')}}" class="btn btn-sm 
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
                        <td colspan="2"><i class="fas fa-image"></i> <strong>Data Foto<strong></td>
                      </tr>            
                      <tr>
                        <td><strong>Foto<strong></td>
                        <td><img src="{{asset('public/foto/'.$DataFoto->foto)}}" class="img-fluid" width="200px;"></td>
                      </tr>                        
                      <tr>
                        <td width="20%"><strong>Nama File<strong></td>
                        <td width="80%">{{ $DataFoto->foto}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Dibuat Oleh<strong></td>
                        <td width="80%">{{ $DataFoto->users_created_at->name}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Dibuat Pada<strong></td>
                        <td width="80%">{{ $DataFoto->created_at}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Diubah Oleh<strong></td>
                        <td width="80%">{{ $DataFoto->users_updated_at->name}}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Diubah Pada<strong></td>
                        <td width="80%">{{ $DataFoto->updated_at}}</td>
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
