@extends('admin.layout')
@section('content')

  <div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card border-end">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $petugasCount }}</h2>
                            <span class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">
                                admin & staff
                            </span>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Petugas</h6>
                    </div>
                    <div class="ms-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card border-end">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $postCount }}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Postingan</h6>
                    </div>
                    <div class="ms-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="edit"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card border-end">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $galeriCount }}</h2>
                            {{-- <span class="badge bg-danger font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">
                                semua kategori
                            </span> --}}
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Galeri</h6>
                    </div>
                    <div class="ms-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="image"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 font-weight-medium">{{ $agendaCount }}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Agenda</h6>
                    </div>
                    <div class="ms-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection