@extends('layouts.app')
@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center p-3">
        <h5 class="mb-0 text-success">Daftar Menu Tersedia</h5>
        <a href="{{ route('menus.create') }}" class="btn btn-success btn-sm rounded-pill">
            <i class="bi bi-plus-circle me-1"></i> Tambah Menu
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark"> 
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col" class="text-center">Foto</th>
                        <th scope="col" class="text-end">Harga</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $menu->nama_menu }}</td>
                        <td class="text-center">
                            @if($menu->foto)
                                <img src="{{ asset('storage/' . $menu->foto) }}" width="70" class="img-thumbnail rounded-3" alt="Foto {{ $menu->nama_menu }}">
                            @else
                                <span class="badge bg-secondary">Tidak Ada Foto</span>
                            @endif
                        </td>
                        <td class="text-end align-middle">
    Rp {{ number_format($menu->harga, 0, ',', '.') }}
</td>
                        <td class="text-center">
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-info btn-sm me-1 text-white" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus menu {{ $menu->nama_menu }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($menus->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center p-4 text-muted">Belum ada data menu. Silakan tambahkan menu baru.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection