@extends('layouts.app')

@section('header')
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <img src="{{ asset('user/images/logokabupatenmalang.png') }}" style="width: 70px; height: 85px; margin-right: 10px;" alt="">
        <a class="text-white navbar-brand" href="#">
            <h6>Pemerintah Kabupaten Malang</h6>
            <h5>Desa Kalisongo</h5>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#da-navbarNav" aria-controls="da-navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse text-uppercase" id="da-navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/')}}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/berita')}}">Berita</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/arsip')}}">Arsip</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/struktur')}}">Struktur</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/galeri-foto')}}">Galeri Foto</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="carouselExampleIndicators" class="carousel slide black-background-color mt-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item  active">
            <div class="item" style="background-image: url('user/images/kantordesakalisongo.jpg');"></div>
        </div>
        <div class="carousel-item">
            <div class="item" style="background-image: url('user/images/kantordesakalisongo2.jpg');"></div>
        </div>
        <div class="carousel-item">
            <div class="item" style="background-image: url('user/images/kantordesakalisongo.jpg');"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endsection
    
@section('main-content')
<div class="page-content">
    <div>
        <div class="da-section bg-secondary text-white" id="profile">
            <div class="container">
                <div class="row px-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="media py-2" data-aos="flip-up"><i class="mr-3 fas fa-smile  fa-3x fa-fw"></i>
                            <div class="media-body">
                                <div class="h5">10000</div>
                                <div class="h6">Penduduk</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="media py-2" data-aos="flip-up"><i class="mr-3 fas fa-house fa-3x fa-fw"></i>
                            <div class="media-body">
                                <div class="h5">4</div>
                                <div class="h6">Dusun</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="media py-2" data-aos="flip-up"><i class="mr-3 fas fa-users  fa-3x fa-fw"></i>
                            <div class="media-body">
                                <div class="h5">6</div>
                                <div class="h6">Rukun Warga</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="media py-2" data-aos="flip-up"><i class="mr-3 fas fa-people-arrows fa-3x fa-fw"></i>
                            <div class="media-body">
                                <div class="h5">14</div>
                                <div class="h6">Rukun Tetangga</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="da-section da-work bg-light" id="news">
            <div class="container">
                <div class="h3 pb-3 text-center" data-aos="fade-up">Berita</div>
                <p class="px-5 pb-5 text-center" data-aos="fade-up">Berita Terbaru dari Desa Kalisongo</p>
                <div class="col">
                    @if($JumlahDataBerita>0)
                    <div class="row">
                    @if (!empty($DataBerita))
                    @foreach ($DataBerita as $key => $News )
                        <div class="col-md-4">
                            <div class="card mb-3" data-aos="zoom-in-up">
                                <img src="{{ asset('public/gambar/'.$News->gambar) }}" class="card-equal-height-image rounded" alt="">
                                <div class="card-body mt-1">
                                    <a href="{{url('/berita.'.$News->id_news.'.detail')}}" class="text-decoration-none text-secondary"><div class="h4">
                                        {{Str::limit($News->judul, 40, '...')}}
                                    </div></a>
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
                        <button type="button" class="btn btn-primary mx-auto d-block mt-3" data-aos="fade-up"><a href="{{url('/berita')}}" class="text-decoration-none text-white">Berita Lainnya</a></button>
                    </div>
                    @else
                    <h3 class="h4 text-center" data-aos="fade-up">Tidak Ada Berita</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="da-section da-work bg-secondary" id="archive">
            <div class="container">
                <div class="h3 pb-3 text-center text-white" data-aos="fade-up">Arsip</div>
                <p class="px-5 pb-5 text-center text-white" data-aos="fade-up">Arsip Terbaru dari Desa Kalisongo</p>
                <div class="col">
                    @if($JumlahDataArsip>0)
                    <div class="row">
                    @if (!empty($DataArsip))
                    @foreach ($DataArsip as $key => $Archive )
                        <div class="col-md-4">
                            <div class="card mb-3" data-aos="zoom-in-up">
                                <img src="{{ asset('public/cover/'.$Archive->cover) }}" class="card-equal-height-image rounded" alt="">
                                <div class="card-body mt-1">
                                    <div class="h4">{{Str::limit($Archive->judul, 40, '...')}}</div>
                                    <p><i class="fas fa-user"></i> {{$Archive->users_updated_at->name}} &nbsp;<i class="fas fa-calendar-alt"></i> {{$Archive->updated_at}}</p>
                                </div>
                                <div class="col">
                                    <a href="{{url('/arsip.'.$Archive->id_archive.'.detail')}}" class="text-decoration-none text-white btn btn-primary mx-auto d-block mb-3">Lihat</a>
                                </div>
                            </div>
                        </div>  
                    @endforeach
                    @endif
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary mx-auto d-block mt-3" data-aos="fade-up"><a href="{{url('/arsip')}}" class="text-decoration-none text-white">Arsip Lainnya</a></button>
                    </div>
                    @else
                    <h3 class="h4 text-center" data-aos="fade-up">Tidak Ada Arsip</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="da-projects" id="projects">
            <div class="row mx-0">
                <div class="col-md-6 px-0 da-project-1" style="background-image: url('user/images/kantordesakalisongo.jpg')" data-aos="zoom-in"></div>
                <div class="col-md-6 pl-5 pt-5 pb-3">
                    <div class="row">
                        <div class="col-10">
                            <div class="h4">Mengenal Desa Kalisongo</div>
                            <p>Desa Kalisongo merupakan sebuah desa di wilayah Kecamatan Dau, Kabupaten Malang, Provinsi Jawa Timur. Posisinya berada di perbukitan sisi utara dari Kota Malang. Di dalam wilayahnya berdiri cukup banyak perumahan kelas menengah-atas, karena aksesnya yang mudah menuju pusat kota dan berbatasan langsung dengan wilayah Kecamatan Sukun. Salah satu perumahan yang cukup dikenal adalah Villa Puncak Tidar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-md-6 pl-5 pt-5 pb-3">
                    <div class="row mb-3">
                        <!-- <div class="col-1 da-project-icon"><i class="text-warning fas fa-money-bill-alt fa-2x fa-fw"></i></div> -->
                        <div class="col-10">
                            <div class="h4">Dusun di Desa Kalisongo</div>
                            <p>Desa Kalisongo memiliki 4 Dusun yaitu : </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 da-project-icon"><i class="text-info fas fa-1 fa-2x fa-fw"></i></div>
                        <div class="col-10">
                            <div class="h4">Kuso</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 da-project-icon"><i class="text-info fas fa-2 fa-2x fa-fw"></i></div>
                        <div class="col-10">
                            <div class="h4">Lo'andeng</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 da-project-icon"><i class="text-info fas fa-3 fa-2x fa-fw"></i></div>
                        <div class="col-10">
                            <div class="h4">Kunci</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 da-project-icon"><i class="text-info fas fa-4 fa-2x fa-fw"></i></div>
                        <div class="col-10">
                            <div class="h4">Sumberjo</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0 da-project-2" style="background-image: url('user/images/petadesakalisongo.jpg');" data-aos="zoom-in"></div>
            </div>
        </div>
        <div class="da-expertise">
            <div class="row mx-0">
                <div class="col-md-6 px-0 da-exp-image" style="background-image: url('user/images/kantordesakalisongo2.jpg');" data-aos="zoom-in"></div>
                <div class="col-md-6 da-exp-skills">
                    <div class="row">
                        <div class="col-10">
                            <div class="text-uppercase">
                                <div class="h4">Destinasi Wisata Desa Kalisongo</div>
                            </div>
                            <p>Beberapa destinasi wisata yang dapat ditemukan di Desa Kalisongo beserta link lokasi : </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 da-project-icon"><i class="text-info fas fa-1 fa-2x fa-fw"></i></div>
                        <div class="col-10">
                            <div class="h4"><a href="https://www.google.com/maps/place/Kampung+Cempluk/@-7.9680876,112.5943618,17z/data=!3m1!4b1!4m5!3m4!1s0x2e78825788f7a04d:0xb7cfa4254354bbf4!8m2!3d-7.9680725!4d112.5965581" class="text-decoration-none">Kampung Cempluk</a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 da-project-icon"><i class="text-info fas fa-2 fa-2x fa-fw"></i></div>
                        <div class="col-10">
                            <div class="h4"><a href="https://www.google.com/maps/place/Pemandian+Asmorodono/@-7.9668392,112.5723217,18z/data=!4m5!3m4!1s0x2e788336615927bf:0xabc53c09ca3f4a4!8m2!3d-7.9669375!4d112.5734375" class="text-decoration-none">Pemandian Asmorodono</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="da-section bg-secondary" id="structure">
            <div class="container">
                <div class="h3 text-center text-white" data-aos="fade-up">Struktur Perangkat Desa</div>
            </div>
            <div class="da-team carousel slide py-5" id="da-carouselIndicator" data-ride="carousel" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="container">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#da-carouselIndicator" data-slide-to="0"></li>
                        <li data-target="#da-carouselIndicator" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
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
                            </div>
                        </div>
                        <div class="carousel-item">
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
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary mx-auto d-block mt-3" data-aos="fade-up"><a href="{{url('/struktur')}}" class="text-decoration-none text-white">Perangkat Desa Lainnya</a></button>
        </div>
        <div class="container da-gallery mb-5" id="gallery">
            <div class="h3 pb-5 text-center" data-aos="fade-up">Galeri Foto</div>
            @if($JumlahDataFoto>0)
            <div class="card-columns">
            @if (!empty($DataFoto))
            @foreach($DataFoto as $key => $Photo)
                <div class="card" data-aos="zoom-in-up"><a href="{{ asset('public/foto/'.$Photo->foto) }}" data-toggle="lightbox" data-gallery="da-gallery"><img class="img-fluid" src="{{ asset('public/foto/'.$Photo->foto) }}" alt="Galeri Foto"/></a></div>
            @endforeach
            @endif
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary mx-auto d-block mt-3" data-aos="fade-up"><a href="{{url('/galeri-foto')}}" class="text-decoration-none text-white">Galeri Foto Lainnya</a></button>
            </div>
            @else
            <h3 class="h4 text-center" data-aos="fade-up">Tidak Ada Foto</h3>
            @endif
        </div>
        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=desa kalisongo&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.kokagames.com/fnf-friday-night-funkin-mods/">FNF</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
        <div class="da-contact" id="contact">
            <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
                <div class="container">
                    <div class="card py-4 px-4">
                        <div class="h4 pb-4">Kritik dan Saran</div>
                        <div class="row">
                            <div class="col-md-7 col-sm-12 mb-3">
                                <div class="da-contact-message">
                                @if (session('status'))
                                    <div class="col-sm-12">
                                        <div class="alert alert-success" role="alert">{!! session()->get('status') !!}</div>
                                    </div>
                                @endif
                                    <form action="{{ url('/kritikdansaran') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row mb-3">
                                            <div class="col">
                                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="" placeholder="*Nama"/>
                                            </div>
                                        </div>
                                        @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row mb-3">
                                            <div class="col">
                                                <input class="form-control @error('subjek') is-invalid @enderror" type="text" name="subjek" value="" placeholder="*Subjek"/>
                                            </div>
                                        </div>
                                        @error('subjek')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row mb-3">
                                            <div class="col">
                                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="" placeholder="*E-mail"/>
                                            </div>
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row mb-3">
                                            <div class="col">
                                                <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" placeholder="*Pesan" rows="4"></textarea>
                                            </div>
                                        </div>
                                        @error('pesan')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-primary" type="submit">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <p>Anda Dapat Menghubungi Kami Melalui : </p>
                                <p><b>Alamat :</b> Desa Kalisongo, Kecamatan Dau, Kabupaten Malang, Provinsi Jawa Timur.</p>
                                <p><b>Phone :</b> +62 811-1111-1111</p>
                                <p><b>Email :</b> pemdeskalisongo@gmail.com</p>
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
                <div class="h2 mb-4">Pemerintah  Desa Kalisongo</div>
                <p class="mb-3">Desa Kalisongo, Kecamatan Dau, Kabupaten Malang, Provinsi Jawa Timur</p>
                <p class="mb-3">pemdeskalisongo@gmail.com</p>
                <p>+62 811-1111-1111</p>
            </div>
            <div class="col-md-4">
                <div class="h6 pb-2">Kontak Kami</div>
                <ul>
                    <!--<li class="mb-1"><a class="da-social-link" href="#"><i class="fab fa-twitter" aria-hidden="true"></i><span class="ml-2">Twitter</span></a></li>-->
                    <li class="mb-1"><a class="da-social-link" href="https://www.facebook.com/groups/963450540665572/?ref=share"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="ml-2">Facebook</span></a></li>
                    <li class="mb-1"><a class="da-social-link" href="https://instagram.com/kkndesakalisongo?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram" aria-hidden="true"></i><span class="ml-2">Instagram</span></a></li>
                    <li class="mb-1"><a class="da-social-link" href="https://youtu.be/oHg5SJYRHA0"><i class="fab fa-youtube" aria-hidden="true"></i><span class="ml-2">Youtube</span></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="h6 pb-1">Copyright</div>
                <p class="pb-1">&copy;  Pemerintah Desa Kalisongo</p>
                <!--<p>Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a></p>>-->
            </div>
        </div>
    </div>
</footer>
@endsection