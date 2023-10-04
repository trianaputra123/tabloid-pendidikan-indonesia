@extends('layouts.other.app')

@section('content')
    <div class="row mb-3">
        {{-- berita terkini --}}
        <div class="col-md-7">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                {{-- <h5>Berita Terkini</h5> --}}
                <div class="card mb-3" style="position: relative">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        style="height: 400px; object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body app-overlay-bg" style="position: absolute; bottom: 0; width: 100%;">
                        <h5 class="card-title mb-1">{{ $latest->judul }}</h5>
                        {{-- time created --}}
                        <small class="text-dark">
                            {{ $latest->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            @endif
        </div>

        {{-- berita terpopuler --}}
        <div class="col-md-5">
            {{-- <h5 style="visibility: hidden;">A</h5> --}}
            <div class="app-bg-base mb-3 p-3"
                style="height: 400px; object-fit: cover; object-position: center; position: relative; overflow: auto;">
                {{-- <img src="{{ asset('img/card.png') }}" class="w-100 h-100" alt="..."
                style="object-fit: contain; object-position: center"> --}}
                <h5 class="text-center">Sekapur Sirih</h5>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto ab impedit aspernatur laborum. Magni
                    deserunt et nulla, adipisci eaque, ipsum debitis eveniet natus distinctio voluptates dolor! Laboriosam,
                    ut commodi nesciunt laborum nemo magni dolore quis facere? Tenetur, alias animi voluptate laborum fuga
                    aliquam blanditiis? Voluptatibus aperiam ipsum consectetur alias exercitationem esse libero!
                    Perferendis, quas unde enim perspiciatis veniam asperiores repellat quasi quae natus, animi non quod
                    maiores id temporibus ducimus beatae modi sapiente nobis explicabo quidem! Ducimus et voluptatem ipsam!
                </p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis recusandae libero eum, tempora at et
                    inventore velit, eaque praesentium laboriosam vel, amet illo numquam adipisci fugiat autem blanditiis?
                    Sequi reprehenderit fugit dignissimos iure eligendi. Aperiam, qui deleniti. Aut, accusantium iusto.</p>
            </div>
        </div>
    </div>

    {{-- sekapur sirih --}}
    <h4>Berita Terbaru</h4>
    <div class="p-3 row">
        {{-- 2 card in 1 row --}}
        <div class="col-md-6">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                {{-- <h5>Berita Terkini</h5> --}}
                <div class="card mb-3" style="position: relative">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        style="height: 400px; object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body app-overlay-bg" style="position: absolute; bottom: 0; width: 100%;">
                        <h5 class="card-title mb-1">{{ $latest->judul }}</h5>
                        {{-- time created --}}
                        <small class="text-dark">
                            {{ $latest->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                {{-- <h5>Berita Terkini</h5> --}}
                <div class="card mb-3" style="position: relative">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        style="height: 400px; object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body app-overlay-bg" style="position: absolute; bottom: 0; width: 100%;">
                        <h5 class="card-title mb-1">{{ $latest->judul }}</h5>
                        {{-- time created --}}
                        <small class="text-dark">
                            {{ $latest->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                {{-- <h5>Berita Terkini</h5> --}}
                <div class="card mb-3" style="position: relative">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        style="height: 200px; object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body app-overlay-bg" style="position: absolute; bottom: 0; width: 100%;">
                        <h6 class="card-title mb-1">{{ $latest->judul }}</h6>
                        {{-- time created --}}
                        {{-- <small class="text-dark">
                            {{ $latest->created_at->diffForHumans() }}
                        </small> --}}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                {{-- <h5>Berita Terkini</h5> --}}
                <div class="card mb-3" style="position: relative">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        style="height: 200px; object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body app-overlay-bg" style="position: absolute; bottom: 0; width: 100%;">
                        <h6 class="card-title mb-1">{{ $latest->judul }}</h6>
                        {{-- time created --}}
                        {{-- <small class="text-dark">
                            {{ $latest->created_at->diffForHumans() }}
                        </small> --}}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                {{-- <h5>Berita Terkini</h5> --}}
                <div class="card mb-3" style="position: relative">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        style="height: 200px; object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body app-overlay-bg" style="position: absolute; bottom: 0; width: 100%;">
                        <h6 class="card-title mb-1">{{ $latest->judul }}</h6>
                        {{-- time created --}}
                        {{-- <small class="text-dark">
                            {{ $latest->created_at->diffForHumans() }}
                        </small> --}}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                {{-- <h5>Berita Terkini</h5> --}}
                <div class="card mb-3" style="position: relative">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        style="height: 200px; object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body app-overlay-bg" style="position: absolute; bottom: 0; width: 100%;">
                        <h6 class="card-title mb-1">{{ $latest->judul }}</h6>
                        {{-- time created --}}
                        {{-- <small class="text-dark">
                            {{ $latest->created_at->diffForHumans() }}
                        </small> --}}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <h4>Berita Terpopuler</h4>

    <div class="row mb-5">
        @if ($berita->count() > 0)
            <div class="col-md-7 mb-5">
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp
                <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top mb-3"
                    style="height: 300px; object-fit: cover; object-position: center"
                    alt="{{ asset('img/berita/' . $latest->gambar) }}">

                <h5>SMK TI Bali Global Mewajibkan Siswanya Bisa Menggunakan Laptop</h5>
                {{-- Created at --}}
                <h6 class="text-muted mt-3">
                    {{-- icon --}}
                    <i class="fas fa-clock"></i>
                    {{ $latest->created_at->diffForHumans() }}
                    <i class="me-3"></i>
                    {{-- icon comment --}}
                    <i class="fas fa-comment"></i>
                    10
                </h6>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam est possimus repudiandae ut quibusdam
                    voluptatum odit hic ipsam dolore excepturi suscipit, perspiciatis, debitis corrupti blanditiis
                    aspernatur
                    voluptatibus quam nulla. Magni?...
                </p>

                {{-- button read more --}}
                <a href="#" class="btn btn-outline-primary app-color-primary">Read More</a>
            </div>
        @endif

        {{-- list berita lainnya --}}
        <div class="col-md-5 mb-5">
            @forelse ($berita as $item)
                <div class="row mb-2">
                    <img src="{{ asset('img/berita/' . $item->gambar) }}" class="col-4"
                        style="object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $item->gambar) }}">
                    <div class="col-8">
                        <h6>
                            <a href="#" class="text-decoration-none text-dark">
                                {{ $item->judul }}
                            </a>
                        </h6>
                        <hr>
                        {{-- created at --}}
                        <small>
                            <i class="fas fa-clock"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            @empty
                <small>
                    <i class="fas fa-exclamation-circle"></i>
                    Belum ada berita
                </small>
            @endforelse
        </div>
    </div>

    <h4>Berita Daerah Kab. Buleleng</h4>
    <div class="row flex-row-reverse">
        @if ($berita->count() > 0)
            <div class="col-md-7 mb-5">
                @php
                    $latest = $berita
                        ->where('kecamatan_id', 1)
                        ->sortByDesc('created_at')
                        ->first();
                @endphp
                <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top mb-3"
                    style="height: 300px; object-fit: cover; object-position: center"
                    alt="{{ asset('img/berita/' . $latest->gambar) }}">

                <h5>SMK TI Bali Global Mewajibkan Siswanya Bisa Menggunakan Laptop</h5>
                {{-- Created at --}}
                <h6 class="text-muted mt-3">
                    {{-- icon --}}
                    <i class="fas fa-clock"></i>
                    {{ $latest->created_at->diffForHumans() }}
                    <i class="me-3"></i>
                    {{-- icon comment --}}
                    <i class="fas fa-comment"></i>
                    10
                </h6>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam est possimus repudiandae ut quibusdam
                    voluptatum odit hic ipsam dolore excepturi suscipit, perspiciatis, debitis corrupti blanditiis
                    aspernatur
                    voluptatibus quam nulla. Magni?...
                </p>

                {{-- button read more --}}
                <a href="#" class="btn btn-outline-primary app-color-primary">Read More</a>
            </div>
        @endif

        {{-- list berita lainnya --}}
        <div class="col-md-5 mb-5">
            @forelse ($berita as $item)
                <div class="row mb-2">
                    <img src="{{ asset('img/berita/' . $item->gambar) }}" class="col-4"
                        style="object-fit: cover; object-position: center"
                        alt="{{ asset('img/berita/' . $item->gambar) }}">
                    <div class="col-8">
                        <h6>
                            <a href="#" class="text-decoration-none text-dark">
                                {{ $item->judul }}
                            </a>
                        </h6>
                        <hr>
                        {{-- created at --}}
                        <small>
                            <i class="fas fa-clock"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            @empty
                <small>
                    <i class="fas fa-exclamation-circle"></i>
                    Belum ada berita
                </small>
            @endforelse
        </div>
    </div>
@endsection
