@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-info text-white rounded-top-4 p-3">
                <h4 class="mb-0">✏️ Edit Menu: **{{ $menu->nama_menu }}**</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    {{-- 1. Nama Menu --}}
                    <div class="mb-3">
                        <label for="nama_menu" class="form-label fw-bold">Nama Menu</label>
                        <input type="text" name="nama_menu" id="nama_menu"
                               class="form-control @error('nama_menu') is-invalid @enderror"
                               placeholder="Contoh: Nasi Goreng Spesial"
                               value="{{ old('nama_menu', $menu->nama_menu) }}" required>
                        @error('nama_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- 2. Harga --}}
                    <div class="mb-3">
                        <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" id="harga"
                               class="form-control @error('harga') is-invalid @enderror"
                               placeholder="Contoh: 25000"
                               value="{{ old('harga', $menu->harga) }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- 3. Foto --}}
                    <div class="mb-4">
                        <label for="foto" class="form-label fw-bold">Ganti Foto Menu</label>
                        @if($menu->foto)
                            <div class="mb-2">
                                <p class="mb-1 text-muted">Foto Saat Ini:</p>
                                <img src="{{ asset('storage/' . $menu->foto) }}" width="100" class="img-thumbnail rounded-3" alt="Foto {{ $menu->nama_menu }}">
                            </div>
                        @endif
                        <input type="file" name="foto" id="foto"
                               class="form-control @error('foto') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/jpg">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-end pt-2 border-top">
                        <a href="{{ route('menus.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-info text-white">
                            <i class="bi bi-arrow-clockwise"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection