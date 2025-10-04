@extends('layouts.dashboard')

@section('content')
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-light btn-sm" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0">Aset / Edit</h5>
        </div>
        <a href="{{ route('aset.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('aset.edit', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." value="{{ old('nama') ?? $data->nama }}" required>
                @error('nama')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $data->deskripsi) }}</textarea>
            </div>
            

            <div class="mb-4">
                <label class="form-label">Role</label>
                <select class="form-select" name="kondisi" required>
                    <option value="">Pilih Role...</option>
                    <option value="baik" 
                        {{ (old('kondisi') ?? $data->kondisi) == 'baik' ? 'selected' : '' }}>
                        Baik
                    </option>
                    <option value="rusakRingan" 
                        {{ (old('kondisi') ?? $data->kondisi) == 'rusakRingan' ? 'selected' : '' }}>
                        Rusak Ringan
                    </option>
                    <option value="rusakBerat" 
                        {{ (old('kondisi') ?? $data->kondisi) == 'rusakBerat' ? 'selected' : '' }}>
                        Rusak Berat
                    </option>
                </select>
                @error('roles')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Kondisi</label>
                <textarea name="deskripsi_kondisi" class="form-control" rows="3">{{ old('deskripsi_kondisi') ?? $data->OpnameAset->last()->deskripsi  }}</textarea>
                @error('deskripsi_kondisi')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>  

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">Simpan</button>
            </div>
        </form>

    </div>

    <!-- Aset yang Dipakai -->
@endsection
