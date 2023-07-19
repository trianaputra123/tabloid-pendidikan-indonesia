@extends('layouts.other.app')

@section('content')
    <div class="row mb-3">
        {{-- berita terkini --}}
        <div class="col-md-5">
            @if ($berita->count() > 0)
                {{-- get latest berita --}}
                @php
                    $latest = $berita->sortByDesc('created_at')->first();
                @endphp

                <h5>Berita Terkini</h5>
                <div class="card mb-3">
                    <img src="{{ asset('img/berita/' . $latest->gambar) }}" class="card-img-top"
                        alt="{{ asset('img/berita/' . $latest->gambar) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $latest->judul }}</h5>
                        <div class="card-text">
                            {!! Str::limit($latest->isi, 100, '...') !!}
                        </div>
                        <div class="row justify-content-between">
                            <p class="card-text col-5"><small class="text-muted">
                                    {{ $latest->created_at->diffForHumans() }}
                                </small></p>
                            <div class="col-4 mt-1 text-end">
                                <a href="{{ route('guest.berita.detail', $latest->slug) }}"
                                    class="btn btn-sm btn-outline-dark">
                                    {{-- fontawsome eye icon --}}
                                    <i class="fas fa-eye"></i> Baca
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- berita terpopuler --}}
        <div class="col-md-7">
            <h5 style="visibility: hidden;">A</h5>
            <div class="bg-secondary mb-3" style="height: 470px; position: relative;">
                {{-- <img src="{{ asset('img/card.png') }}" class="w-100 h-100" alt="..."
                style="object-fit: contain; object-position: center"> --}}
                <h4 style="position: absolute; left: 33%; top: 45%;">Peringatan Hari Raya</h4>
            </div>

            {{-- <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- sekapur sirih --}}
    <div class="bg-light mb-5 p-3">
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

    <h5>Berita Lainnya</h5>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($berita as $item)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/berita/' . $item->gambar) }}" class="card-img-top"
                        alt="{{ asset('img/berita/' . $item->gambar) }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $item->judul }}
                        </h5>
                        <div class="card-text">

                            {{-- clean the content isi from tag --}}
                            @php
                                $item->isi = preg_replace('/<[^>]*>/', '', $item->isi);
                            @endphp

                            {{ Str::limit($item->isi, 100, '...') }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <p class="card-text col-5"><small class="text-muted">
                                    {{ $item->created_at->diffForHumans() }}
                                </small></p>
                            <div class="col-4 mt-1 text-end">
                                <a href="{{ route('guest.berita.detail', $item->slug) }}"
                                    class="btn btn-sm btn-outline-dark">
                                    {{-- fontawsome eye icon --}}
                                    <i class="fas fa-eye"></i> Baca
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-danger text-center" role="alert">
                    Belum ada berita
                </div>
            </div>
        @endforelse
    </div>
@endsection
