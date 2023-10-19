<div class="fixed-top">
    <nav class="navbar navbar-expand-lg app-bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center justify-content-between" href="#">
                <img src="{{ asset('/img/logo.png') }}" alt="Logo"
                    style="width: 58px; height: 58px; object-fit: cover;" class="d-inline-block align-text-top">
                Tabloid Pendidikan Indonesia
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" style="width: 100%" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn app-bg-secondary text-light" type="submit">Search</button>
                </form>
                <ul class="navbar-nav mb-2 ms-3 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold m-md-2 mb-3 text-center" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::is('auth'))
                            <a class="nav-link fw-bold text-dark active app-bg-third m-md-2 my-3 text-center"
                                aria-current="page" href="{{ route('landing') }}">Beranda</a>
                        @else
                            <a class="nav-link fw-bold text-dark active app-bg-third m-md-2 my-3 text-center"
                                aria-current="page" href="{{ route('auth') }}">Masuk</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold app-bg-secondary m-md-2 mb-3 text-center" href="#">Daftar</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <div class="sec-nav app-bg-secondary p-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="overflow-y:visible;">
                    <ul class="nav justify-content-start">
                        @forelse ($kabupaten as $item)
                            {{-- <li class="nav-item">
                                <a class="nav-link text-light" href="#">{{ $item->nama_kabupaten }}</a>
                            </li> --}}
                            {{-- dropdown --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $item->nama_kabupaten }}
                                </a>
                                <ul class="dropdown-menu app-overlay-bg border-none">
                                    @forelse ($item->kecamatan as $kecamatan)
                                        <li><a class="dropdown-item app-overlay-bg"
                                                href="#">{{ $kecamatan->nama_kecamatan }}</a>
                                        </li>
                                    @empty
                                        <li><a class="dropdown-item app-overlay-bg" href="#">Tidak ada
                                                kecamatan</a></li>
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Tidak ada kabupaten</a>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="height: 120px;">

</div>
