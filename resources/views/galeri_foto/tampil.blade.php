@extends('layouts.app')
@section('header')
<header class="d-flex flex-column" style="
    margin-top: 5%;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    height: 100vh;
    min-height: 600px;
    max-height: 1080px;
    background-size: cover !important;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)) , url('user/images/photo.jpg');">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="text-white navbar-brand" href="{{url('/')}}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
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
    <div class="da-home-page-text flex-grow-1 d-flex align-items-center" data-aos="fade-right" data-aos-duration="1000">
        <div class="container">
            <h2 class="display-3 text-uppercase text-center">Galeri Foto</h2>
            <h3 class="h4 mt-3 text-center">Galeri Foto Kegiatan di Desa Kalisongo</h3>
        </div>
    </div>
</header>
@endsection

@section('main-content')
<div class="page-content">
    <div>
        <div class="da-section" id="structure">
            <div class="container">
                @if($JumlahDataFoto>0)
                <div class="card-columns">
                @if (!empty($DataFoto))
                @foreach($DataFoto as $key => $Photo)
                <div class="card"><a href="{{ asset('public/foto/'.$Photo->foto) }}" data-toggle="lightbox" data-gallery="da-gallery"><img class="card-equal-height-image img-fluid" src="{{ asset('public/foto/'.$Photo->foto) }}" alt="Galeri Foto"/></a></div>
                @endforeach
                @endif
                </div>
                @else
                    <h3 class="h4 mt-3 text-center">Tidak Ada Foto</h3>
                @endif 
            </div>
            <ul class="pagination pagination-sm m-0 justify-content-center">{{ $DataFoto->links() }}</ul>
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