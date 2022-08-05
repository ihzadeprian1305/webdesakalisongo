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
background-image: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)) , url('user/images/kantordesakalisongo.jpg');">
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
          <h2 class="display-3 text-uppercase text-center">Struktur Perangkat Desa</h2>
          <h3 class="h4 mt-3 text-center">Struktur Perangkat Pemerintahan Desa Kalisongo</h3>
        </div>
      </div>
    </header>
    @endsection
    @section('main-content')
    <div class="page-content">
      <div>
        <div class="da-section" id="structure">
          <div class="da-team carousel slide py-5" id="da-carouselIndicator" data-ride="carousel" data-aos="zoom-in-up" data-aos-duration="1000">
            <div class="container">
                  <div class="row">
                    <div class="col-md-4">
                    </div>
                    @if (!empty($DataStrukturKepalaDesa))
          @foreach ($DataStrukturKepalaDesa as $key => $StructureKP )  
            <div class="col-md-4">
              <div class="card d-block mb-3"><img class="card-equal-height-image card-img-top" src="{{ asset('public/foto_struktur/'.$StructureKP->foto) }}" alt="image"/>
                <div class="card-body text-center">
                  <div class="h5">{{$StructureKP->nama}}</div>
                  <p class="text-muted">NIP {{$StructureKP->nip}}</p>
                  <p class="text-muted">{{$StructureKP->positions->jabatan}}</p>
                </div>
              </div>
            </div>
            @endforeach
        @endif
                    <div class="col-md-4">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    </div>
                    @if (!empty($DataStrukturSekretarisDesa))
          @foreach ($DataStrukturSekretarisDesa as $key => $StructureSP )  
            <div class="col-md-4">
              <div class="card d-block mb-3"><img class="card-equal-height-image card-img-top" src="{{ asset('public/foto_struktur/'.$StructureSP->foto) }}" alt="image"/>
                <div class="card-body text-center">
                  <div class="h5">{{$StructureSP->nama}}</div>
                  <p class="text-muted">NIP {{$StructureSP->nip}}</p>
                  <p class="text-muted">{{$StructureSP->positions->jabatan}}</p>
                </div>
              </div>
            </div>
            @endforeach
        @endif
                    <div class="col-md-4">
                    </div>
                  </div>
                  <div class="row">
                  @if (!empty($DataStrukturKepalaUrusan))
          @foreach ($DataStrukturKepalaUrusan as $key => $StructureKU )  
            <div class="col-md-4">
              <div class="card d-block mb-3"><img class="card-equal-height-image card-img-top" src="{{ asset('public/foto_struktur/'.$StructureKU->foto) }}" alt="image"/>
                <div class="card-body text-center">
                  <div class="h5">{{$StructureKU->nama}}</div>
                  <p class="text-muted">NIP {{$StructureKU->nip}}</p>
                  <p class="text-muted">{{$StructureKU->positions->jabatan}}</p>
                </div>
              </div>
            </div>
            @endforeach
        @endif
                  </div>
                  <div class="row">
                  @if (!empty($DataStrukturKepalaSeksi))
          @foreach ($DataStrukturKepalaSeksi as $key => $StructureKS )  
            <div class="col-md-4">
              <div class="card d-block mb-3"><img class="card-equal-height-image card-img-top" src="{{ asset('public/foto_struktur/'.$StructureKS->foto) }}" alt="image"/>
                <div class="card-body text-center">
                  <div class="h5">{{$StructureKS->nama}}</div>
                  <p class="text-muted">NIP {{$StructureKS->nip}}</p>
                  <p class="text-muted">{{$StructureKS->positions->jabatan}}</p>
                </div>
              </div>
            </div>
            @endforeach
        @endif
              </div>
                  <div class="row">
                  @if (!empty($DataStrukturKepalaDusun))
          @foreach ($DataStrukturKepalaDusun as $key => $StructureKD )  
            <div class="col-md-3">
              <div class="card d-block mb-3"><img class="card-equal-height-image card-img-top" src="{{ asset('public/foto_struktur/'.$StructureKD->foto) }}" alt="image"/>
                <div class="card-body text-center">
                  <div class="h5">{{$StructureKD->nama}}</div>
                  <p class="text-muted">NIP {{$StructureKD->nip}}</p>
                  <p class="text-muted">{{$StructureKD->positions->jabatan}}</p>
                </div>
              </div>
            </div>
            @endforeach
        @endif
              </div>
                  <div class="row">
                  @if (!empty($DataStrukturPegawai))
          @foreach ($DataStrukturPegawai as $key => $StructureP )  
            <div class="col-md-3">
              <div class="card d-block mb-3"><img class="card-equal-height-image card-img-top" src="{{ asset('public/foto_struktur/'.$StructureP->foto) }}" alt="image"/>
                <div class="card-body text-center">
                  <div class="h5">{{$StructureP->nama}}</div>
                  <p class="text-muted">NIP {{$StructureP->nip}}</p>
                  <p class="text-muted">{{$StructureP->positions->jabatan}}</p>
                </div>
              </div>
            </div>
            @endforeach
        @endif
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