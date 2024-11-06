<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 BOGOR | Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo-smkn4.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="/assets/dist/css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <header class="bg-white shadow-sm p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0">SMKN 4 BOGOR</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Informasi</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Galery</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Agenda</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero container my-4">
        <div class="hero-content text-center">
            <h1>Selamat Datang Di Website SMKN 4 BOGOR</h1>
            <p>AKHLAK terpuji ILMU terkaji TERAMPIL dan Teruji.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Sidebar Section -->
            <aside class="col-md-4">
                <!-- School Profile Card -->
                <div class="card mb-4 text-center" style="border: none; max-width: 400px; margin: auto; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <div style="position: relative;">
                        <img src="assets/images/background/active-bg.jpg" class="card-img-top" alt="Background Image" style="border-top-left-radius: 8px; border-top-right-radius: 8px;">
                        <img src="assets/images/users/1.jpg" alt="SMKN 4 Bogor Logo" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80px; height: 80px; border-radius: 50%; border: 4px solid white;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mt-4">SMKN 4 BOGOR</h5>
                        <p class="card-text">KR4BAT (Kejuruan Empat Hebat)<br>AKHLAK terpuji ILMU terkaji TERAMPIL dan Teruji</p>
                        <p><a href="#" style="text-decoration: none; color: #007bff;">Kontak Kami</a></p>
                        <div class="mt-3">
                            <a href="#" class="me-2"><i class="fab fa-facebook" style="font-size: 1.25rem; color: gray;"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-instagram" style="font-size: 1.25rem; color: gray;"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-youtube" style="font-size: 1.25rem; color: gray;"></i></a>
                            <a href="#" class="me-2"><i class="fas fa-envelope" style="font-size: 1.25rem; color: gray;"></i></a>
                            <a href="#"><i class="fab fa-whatsapp" style="font-size: 1.25rem; color: gray;"></i></a>
                        </div>
                    </div>
                </div>

                <!-- School Agenda Section -->
                <div class="card" style="box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); border-radius: 8px; padding: 20px;">
                    <h3 class="mb-4">Agenda Sekolah</h3>
                    @if($agendaPosts->isEmpty())
                        <p>Tidak ada data tersedia.</p>
                    @else
                        <ul class="list-unstyled">
                            @foreach($agendaPosts as $agenda)
                                <li class="mb-3">
                                    <div class="border p-3" style="border-radius: 8px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                        <h5 class="card-title">{{ $agenda->judul }}</h5>
                                        <p class="card-text">{{ Str::limit($agenda->isi, 100, '...') }}</p>
                                        <span class="badge bg-primary">{{ $agenda->created_at->format('F Y') }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Location Card -->
                <div class="card mb-4 mt-4" style="border: none; max-width: 400px; margin: auto; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <div class="card-header text-center">
                        <h5>Peta Sekolah</h5>
                    </div>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=300&amp;hl=en&amp;q=smkn 4 bogor&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <a href="https://sprunkin.com/">Sprunki</a>
                        </div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 100%;
                                height: 300px;
                            }
                            .gmap_canvas {
                                overflow: hidden;
                                background: none!important;
                                width: 100%;
                                height: 300px;
                            }
                            .gmap_iframe {
                                height: 300px!important;
                            }
                        </style>
                    </div>
                    <a href="#" class="text-center d-block py-2">Lihat peta lebih besar</a>
                </div>
            </aside>

            <!-- Main Content Section -->
            <section class="col-md-8">
                <!-- Gallery Section -->
                <h3 class="mt-0 mb-4">Galeri Kegiatan</h3>
                @if($galleries->isEmpty())
                    <p>Tidak ada data tersedia.</p>
                @else
                    <div id="galleryCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($galleries->chunk(3) as $index => $galleryChunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="d-flex justify-content-center">
                                        @foreach($galleryChunk as $gallery)
                                            <div class="card mx-2 position-relative" style="width: 300px; height: 350px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden;">
                                                
                                                <!-- Category Type Badge at Top-Right Corner -->
                                                <span class="badge bg-primary position-absolute top-0 end-0 m-2" style="z-index: 1;">
                                                    {{ $gallery->post->kategori->judul ?? 'Tipe Kategori' }}
                                                </span>

                                                <!-- Card Image -->
                                                <img src="{{ asset('storage/' . ($gallery->fotos->first()->file ?? 'default.jpg')) }}" 
                                                    class="card-img-top img-fluid" 
                                                    alt="{{ $gallery->fotos->first()->judul ?? 'Gambar Galeri' }}" 
                                                    style="height: 180px; object-fit: cover;">
                                                
                                                <!-- Card Body with Title, Description -->
                                                <div class="card-body" style="padding: 10px 15px; display: flex; flex-direction: column; justify-content: space-between;">
                                                    <div>
                                                        <!-- Title with Top Padding -->
                                                        <h6 class="card-title" style="font-size: 1rem; margin-top: 10px;">
                                                            {{ Str::limit($gallery->post->judul ?? 'Judul Tidak Tersedia', 50) }}
                                                        </h6>
                                                        <p class="card-text" style="font-size: 0.85rem; color: gray;">
                                                            {{ Str::limit($gallery->post->isi ?? 'Konten tidak tersedia', 60) }}
                                                        </p>
                                                    </div>
                                                    <!-- Last Updated Text -->
                                                    <p class="card-text" style="font-size: 0.75rem; color: #6c757d; margin-top: auto;">
                                                        <small class="text-muted">Terakhir diupdate {{ $gallery->updated_at->diffForHumans() ?? 'N/A' }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button> --}}
                    </div>
                @endif    
                    <!-- Latest News Section -->
                    <h3 class="mb-4">Informasi Terkini</h3>
                    @if($latestNewsPosts->isEmpty())
                        <p>Tidak ada data tersedia.</p>
                    @else
                        <div class="row">
                            @foreach($latestNewsPosts as $news)
                                <div class="col-md-4 mb-4">
                                    <div class="card" style="width: 100%; height: 340px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden;">
                                        @php
                                            $imageFile = optional($news->galery->first()->fotos->first())->file ?? 'default.jpg';
                                        @endphp
                                        <!-- Card Image with Dark Overlay -->
                                        <div style="position: relative; height: 150px;">
                                            <img src="{{ asset('storage/' . $imageFile) }}" class="card-img-top" alt="{{ $news->judul }}" style="height: 100%; width: 100%; object-fit: cover; filter: brightness(70%);">
                                            <div class="position-absolute bottom-0 start-0 text-white p-2" style="background: rgba(0, 0, 0, 0.5); width: 100%;">
                                                <h5 class="card-title mb-0" style="font-size: 1rem;">{{ $news->judul }}</h5>
                                            </div>
                                        </div>
                                        
                                        <!-- Card Body with Excerpt and "Baca selengkapnya" Link -->
                                        <div class="card-body" style="padding: 10px 15px;">
                                            <p class="card-text" style="font-size: 0.85rem; color: gray;">
                                                {{ Str::limit($news->isi, 70) }}
                                            </p>
                                        </div>

                                        <div class="mx-3 my-3">
                                            <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#newsModal-{{ $news->id }}">Baca selengkapnya</a>
                                        </div>

                                        <!-- Last Updated at the Bottom of the Card -->
                                        <div class="card-footer text-muted" style="font-size: 0.75rem; padding: 8px 15px;">
                                            Terakhir diupdate {{ $news->updated_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <h5>SMKN 4 Bogor</h5>
                    <p class="mb-0">KR4BAT (Kejuruan Empat Hebat) | AKHLAK Terpuji, ILMU Teruji, TERAMPIL Dan Teruji</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Kontak Kami</h5>
                    <p class="mb-0">Email: <a href="mailto:info@smkn4bogor.sch.id" class="text-white">info@smkn4bogor.sch.id</a></p>
                    <p class="mb-0">Tel: <a href="tel:+62123456789" class="text-white">+62 123 456 789</a></p>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-2"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-white me-2"><i class="fas fa-envelope"></i></a>
                <a href="#" class="text-white"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="text-center mt-3">
                <small>&copy; 2024 SMKN 4 Bogor. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Include Font Awesome for social icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
