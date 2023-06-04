<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="" width="50" height="50"
                class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-4">
                    <a class="nav-link btn btn-primary" aria-current="page" href="{{ route('auth') }}"><i
                            class="fa fa-user-circle" aria-hidden="true"></i> Sign-in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @foreach ($kabupaten as $kab)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $kab->nama_kabupaten }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- kecamatan --}}
                            @foreach ($kab->kecamatan as $kec)
                                <li><a class="dropdown-item" href="#">{{ $kec->nama_kecamatan }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
