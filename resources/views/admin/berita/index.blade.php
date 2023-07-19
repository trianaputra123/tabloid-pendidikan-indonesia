@extends('layouts.admin.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Berita</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="container">
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

        {{-- datatable --}}
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>
                        Nama Kecamatan
                    </th>
                    <th>
                        Nama Kabupaten
                    </th>
                    <th>
                        Status
                    </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                        <td>{{ $item->kecamatan->kabupaten->nama_kabupaten }}</td>
                        <td class="text-center">
                            @if ($item->status == 'draft')
                                <span class="badge bg-secondary text-light">{{ Str::upper($item->status) }}</span>
                            @else
                                <span class="badge bg-success text-light">{{ Str::upper($item->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.berita.publish', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                @if ($item->status == 'draft')
                                    <input type="hidden" name="status" value="publish">
                                    <button class="btn btn-success">Publikasi</button>
                                @else
                                    <input type="hidden" name="status" value="draft">
                                    <button class="btn btn-secondary">Draf</button>
                                @endif
                            </form>
                            <form action="{{ route('admin.berita.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('other-js')
    {{-- datatable --}}
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection
