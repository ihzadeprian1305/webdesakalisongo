@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/admin/user')}}">Data User</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
<section class="content">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;">
        <i class="far fa-list-alt"></i> Form Tambah Data User</h3>
        <div class="card-tools">
          <a href="{{url('/admin/user')}}" class="btn btn-sm btn-warning 
         float-right"><i class="fas fa-arrow-alt-circle-left"></i> 
         Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
      </div>
      <form class="form-horizontal" method="post" 
       action="{{ url('/admin/user') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
           <span class="text-info">
            <i class="fas fa-user-circle"></i> <u>Data User</u>
          </span></label>
          </div>          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">
           Foto </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" name="foto" id="custom-file-input">
                <label class="custom-file-label" for="customFile" id="custom-file-label">Choose file</label>
              </div>  
            </div>
          </div>          
          @error('foto')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">
            Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('nama') 
             is-invalid @enderror" name="nama" id="nama" value="">
            </div>
          </div>
          @error('nama')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">
           Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
              @error('email') is-invalid @enderror" name="email" 
              id="email" value="">
            </div>
          </div>
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="password" class="col-sm-3 
            col-form-label">Password</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
           @error('password') is-invalid @enderror" name="password" id="password" value="">
            </div>
          </div>
          @error('password')
              <span class="text-danger">{{ $message }}</span>
          @enderror

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right">
            <i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
<!-- /.content -->
@endsection
