@extends('layouts.other.app')

@section('other-css')
    <style>
        .border-bottom-blue {
            border-bottom: 3px solid #0d6efd;
        }

        .hover-a:hover {
            background-color: #e9ecef;
        }

        .hover-kab:hover {
            background-color: #024bb9 !important;
        }

        .hover-kec:hover {
            background-color: #009ab9 !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="bg-light">
                <div class="d-flex">
                    <a href="#" class="text-decoration-none hover-kab bg-primary p-2 col-3 text-white"
                        style="font-weight: bolder; border-top-right-radius: 80px">
                        {{ $berita->kecamatan->kabupaten->nama_kabupaten }}
                    </a>
                    <a href="#" class="text-decoration-none hover-kec bg-info p-2 col-3 text-white"
                        style="font-weight: bolder; border-top-right-radius: 80px">
                        {{ $berita->kecamatan->nama_kecamatan }}
                    </a>
                </div>
            </div>
            <div class="border p-3">
                <h1>
                    {{ $berita->judul }}
                </h1>
                <p class="text-muted">
                    {{-- convert to day_name, dd MM YY Hour:Minute --}}
                    {{ $berita->created_at->isoFormat('dddd, D MMMM Y HH:mm') }}
                </p>
                <hr>
                {{-- author --}}
                <p>
                    <i class="fas fa-user"></i> {{ $berita->user->name }}
                </p>

                <div class="mt-3">
                    <img src="{{ asset('img/berita/' . $berita->gambar) }}" style="width: 50%; float: left" class="me-3"
                        alt="{{ $berita->gambar }}">

                    <div class="mt-3">
                        {!! $berita->isi !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="px-2 pt-2">
                <h5><span class="border-bottom-blue">berita</span> <span
                        class="text-danger">{{ Str::upper($berita->kecamatan->nama_kecamatan) }}</span></h5>
            </div>
            <div class="p-3">
                {{-- list berita untuk kecamatan --}}
                @php
                    $beritaKecamatan = $berita->kecamatan->berita
                        ->where('status', 'publish')
                        ->sortByDesc('created_at')
                        ->take(5);
                @endphp


                @forelse ($beritaKecamatan as $item)
                    <a href="{{ route('guest.berita.detail', $item->slug) }}" class="row mb-3 text-decoration-none hover-a">
                        <div class="col-7 my-1">
                            <b>
                                {{ $item->judul }}
                            </b>
                            {{-- diff --}}
                            <p class="text-muted" style="font-size: 11px">
                                <i class="fas fa-clock"></i> {{ $item->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="col-5 my-1">
                            {{-- gambar --}}
                            <img src="{{ asset('img/berita/' . $item->gambar) }}" class="w-100 img-fluid img-thumbnail"
                                alt="">
                        </div>
                    </a>
                @empty
                @endforelse

            </div>

            <div class="px-2 pt-2">
                <h5><span class="text-danger">{{ Str::upper($berita->kecamatan->kabupaten->nama_kabupaten) }}</span></h5>
            </div>

            <div class="px-3 pb-3">
                {{-- list kecamatan --}}
                @php
                    $kecamatan = $berita->kecamatan->kabupaten->kecamatan->sortByDesc('created_at')->take(5);
                @endphp


                @forelse ($kecamatan as $item)
                    <a href="#" class="mb-3 text-decoration-none">
                        <div class="w-100 hover-a p-1">
                            <b>{{ $item->nama_kecamatan }}</b>
                        </div>
                    </a>
                @empty
                @endforelse

            </div>
        </div>
    </div>
@endsection
