@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Berita Desa</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/admin/berita')}}">Data Berita Desa</a></li>
              <li class="breadcrumb-item active">Edit Data Berita Desa</li>
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
        <i class="far fa-list-alt"></i> Form Edit Data Berita Desa</h3>
        <div class="card-tools">
          <a href="{{url('/admin/berita')}}" class="btn btn-sm btn-warning 
          float-right"><i class="fas fa-arrow-alt-circle-left">
         </i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
      </div>
      <form class="form-horizontal" method="post" 
      action="{{ url('/admin/berita.'.$DataBerita->id_news) }}"
      enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
             <span class="text-info">
            <i class="fas fa-bullhorn"></i> <u>Data Berita Desa</u>
           </span></label>
          </div>
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Gambar 
            </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="gambar" id="custom-file-input">
                <label class="custom-file-label" for="customFile" id="custom-file-label">Choose file</label>
                <span class="text-danger" style="font-size:12px">*Jangan Diisi Jika Tidak Ingin Mengubah Gambar</span>
            </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="judul" class="col-sm-3 col-form-label">
             Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('judul') 
              is-invalid @enderror" name="judul" 
              id="judul" value="{{ $DataBerita->judul}}">
            </div>
          </div>
          @error('judul')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">
            Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control @error('isi') 
               is-invalid @enderror" 
              name="isi" id="editor1" rows="12">{{ $DataBerita->isi }}</textarea>
              <span class="text-danger" style="font-size:12px">*Gunakan Shift+Enter untuk Membuat Baris Baru</span>
            </div>
          </div>  
          @error('isi')
              <span class="text-danger">{{ $message }}</span>
          @enderror


          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
@endsection
