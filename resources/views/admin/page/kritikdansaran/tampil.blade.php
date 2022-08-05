@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-comment"></i> Data Kritik dan Saran</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data Kritik dan Saran</li>
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
                <i class="fas fa-list-ul"></i> Daftar  Kritik dan Saran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="get" 
                  action="{{url('/admin/kritikdansaran.cari')}}">
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
                        <th width="30%">Subjek</th>
                        <th width="30%">Pengirim</th>
                        <th width="20%">Dibuat Pada</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    @if (!empty($DataKritikDanSaran))
                    @foreach($DataKritikDanSaran as $key => $CriticAndSuggestion)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $CriticAndSuggestion->subjek }}</td>
                        <td>{{ $CriticAndSuggestion->nama }}</td>
                        <td>{{ $CriticAndSuggestion->created_at }}</td>
                        <td align="center">
                         <form action="{{url('/admin/kritikdansaran.'.$CriticAndSuggestion->id_criticandsuggestion)}}" method="Post" onsubmit="return confirm('Apakah Data Kritik dan Saran {{$CriticAndSuggestion->subjek}} Ingin Dihapus?')">
                          @csrf
                   <a href="{{url('/admin/kritikdansaran.'.$CriticAndSuggestion->id_criticandsuggestion.'.detail')}}" 
                   class="btn btn-xs btn-info" title="Detail">
                    <i class="fas fa-eye"></i></a>
                          
                          <input type="hidden" value="DELETE" 
                          name="_method">
                          <button type="submit" 
                         class="btn btn-xs btn-info" 
                        title="Hapus">
                         <i class="fas fa-trash"></i></button> 
                          </form>                        
                        </td>
                      </tr>
                      @php
                      $no++
                      @endphp

                    @endforeach
                    @else
                    <tr><td colspan="5">Belum Ada Data Kritik dan Saran
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
                {{ $DataKritikDanSaran->links() }}
                </ul>
              </div>
            </div>
            <!-- /.card -->

</section>
<!-- /.content -->
@endsection
