@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Struktur</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/admin/struktur')}}">Data Struktur</a></li>
              <li class="breadcrumb-item active">Edit Data 
              Struktur</li>
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
        <i class="far fa-list-alt"></i> Form Edit Data Struktur</h3>
        <div class="card-tools">
          <a href="{{url('/admin/struktur')}}" class="btn btn-sm btn-warning 
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
      action="{{ url('/admin/struktur.'.$DataStruktur->id_structure) }}"
      enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
             <span class="text-info">
            <i class="fas fa-users"></i> <u>Data Struktur</u>
           </span></label>
          </div>
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto 
            </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="custom-file-input">
                <label class="custom-file-label" for="customFile" id="custom-file-label">Choose file</label>
                <span class="text-danger" 
                style="font-size:12px">
               *Jangan Diisi Jika Tidak Ingin Mengubah Foto</span>
              </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">
             Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('nama') 
              is-invalid @enderror" name="nama" 
              id="nama" value="{{ $DataStruktur->nama}}">
            </div>
          </div>
          @error('nama')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">
            Nomor Induk Pegawai (NIP)</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('nip')  
              is-invalid @enderror" name="nip" 
              id="nip" value="{{ $DataStruktur->nip}}">
            </div>
          </div>
          @error('nip')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="jabatan" class="col-sm-3 col-form-label">
            Jabatan</label>
            <div class="col-sm-7">
              <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
                <option value="">- Pilih Jabatan -</option>
                @if (!empty($DataJabatan))
                    @foreach($DataJabatan as $key => $Position)
                        <option value="{{ $Position->id_position }}"
                        @if ($Position->id_position==$DataStruktur->id_position)
                          selected
                        @endif
                        >{{ $Position->jabatan }}</option>
                    @endforeach
                @endif
              </select>
            </div>
          </div>
          @error('jabatan')
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
