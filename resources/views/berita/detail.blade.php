@extends('layouts.app')
@section('header')
<style>
  header{
    margin-top: 10% !important;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    height: 100vh !important;
    min-height: 600px;
    max-height: 1080px;
    background-size: contain !important;
    background-image: url('{{ asset('public/gambar/'.$DataBerita->gambar)}}');
  }
  
  @media screen and (max-width: 1060px) {
      header {
          margin-top: 20% !important;
          height: 400px !important;
          min-height: 0 !important;
          max-height: 600px !important;
      }
  }
  
  @media screen and (max-width: 768px) {
      header {
          margin-top: 25% !important;
          height: 200px !important;
          min-height: 0 !important;
          max-height: 400px !important;
      }
  }
</style>
<header class="d-flex flex-column mx-5">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
            <a class="text-white navbar-brand" href="{{url('/berita')}}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#da-navbarNav" aria-controls="da-navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-uppercase" id="da-navbarNav">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/')}}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/berita')}}">Berita</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/arsip')}}">Arsip</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/struktur')}}">Struktur</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/galeri-foto')}}">Galeri Foto</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/#contact')}}">Kontak</a></li>
              </ul>
            </div>
            </div>
          </nav>
</header>
@endsection
@section('main-content')
    <div class="page-content mt-5">
      <div>
          <div class="container">
            <div class="h3 pb-3 text-center">{{$DataBerita->judul}}</div>
            <p class="px-5 pb-5 text-center"><i class="fas fa-user"></i> {{$DataBerita->users_updated_at->name}} &nbsp;<i class="fas fa-calendar-alt"></i> {{$DataBerita->updated_at}}</p>
            <p>{!!$DataBerita->isi!!}</p>    
          </div>
          <div class="container mt-3">
            <div class="h3 py-5 text-center">Berita Terbaru</div>
            <div class="col">
            <div class="row">
            @if (!empty($DataBeritaTerbaru))
          @foreach ($DataBeritaTerbaru as $key => $News )
          <div class="col-md-4">
          <div class="card mb-3">
            <img src="{{ asset('public/gambar/'.$News->gambar) }}" class="card-equal-height-image rounded" alt="">
            <div class="card-body mt-1">
              <div class="h4">
              {{Str::limit($News->judul, 40, '...')}}
              </div>
              <p><i class="fas fa-user"></i> {{$News->users_updated_at->name}} &nbsp;<i class="fas fa-calendar-alt"></i> {{$News->updated_at}}</p>
              <p>{!!Str::limit($News->isi, 90, '...')!!}</p>
            </div>
            <div class="col">
              <a href="{{url('/berita.'.$News->id_news.'.detail')}}" class="text-decoration-none text-white btn btn-primary mx-auto d-block mb-3">Baca</a>
            </div>
          </div>
        </div>  
        @endforeach
        @endif
      </div>
        <div class="col">
      <button type="button" class="btn btn-primary mx-auto d-block mt-3"><a href="{{url('/berita')}}" class="text-decoration-none text-white">Berita Lainnya</a></button>
    </div>
            </div>
          </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  @endsection
  @section('footer')
    <footer class="bg-secondary da-section">
      <div class="container text-white">
        <div class="row">
          <div class="col-md-5">
            <div class="h2 mb-4">Pemerintah Desa Kalisongo</div>
            <p class="mb-3">pemdeskalisongo@gmail.com</p>
            <p>+62 811-1111-1111</p>
          </div>
          <div class="col-md-4">
            <div class="h6 pb-2">Ikuti Kami</div>
            <ul>
              <!--<li class="mb-1"><a class="da-social-link" href="#"><i class="fab fa-twitter" aria-hidden="true"></i><span class="ml-2">Twitter</span></a></li>-->
              <li class="mb-1"><a class="da-social-link" href="https://www.facebook.com/groups/963450540665572/?ref=share"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="ml-2">Facebook</span></a></li>
              <li class="mb-1"><a class="da-social-link" href="https://instagram.com/kkndesakalisongo?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram" aria-hidden="true"></i><span class="ml-2">Instagram</span></a></li>
              <li class="mb-1"><a class="da-social-link" href="https://youtu.be/oHg5SJYRHA0"><i class="fab fa-youtube" aria-hidden="true"></i><span class="ml-2">Youtube</span></a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="h6 pb-4">Copyright</div>
            <p class="pb-1">&copy;  KKN Universitas Brawijaya</p>
           <!--<p>Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a></p>>-->
          </div>
        </div>
      </div>
    </footer>
@endsection