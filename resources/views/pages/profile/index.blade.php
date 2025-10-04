@extends('layouts.dashboard')

@section('content')
<div class="card-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-light btn-sm" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>
        <h5 class="mb-0">Profile</h5>
    </div>
</div>

<div class="card-body">
    <form action="{{ route('profile.edit', Auth::user()->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama..."
                value="{{ old('nama') ?? Auth::user()->nama }}" required>
            @error('nama')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
        </div>

        {{-- Password Lama --}}
        <div class="mb-3">
            <label class="form-label">Password Lama</label>
            <div class="position-relative">
                <input type="password" class="form-control" name="old_password" id="old_password"
                    placeholder="Masukkan password lama">
                <button type="button"
                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3 toggle-password"
                    data-target="old_password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('old_password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password Baru --}}
        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <div class="position-relative">
                <input type="password" class="form-control" name="new_password" id="new_password"
                    placeholder="Masukkan password baru">
                <button type="button"
                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3 toggle-password"
                    data-target="new_password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
            @error('new_password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Telepon --}}
        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="number" class="form-control" name="telepon" placeholder="Telepon..."
                value="{{ old('telepon') ?? Auth::user()->telepon }}" required>
            @error('telepon')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-dark">Simpan</button>
        </div>
    </form>
</div>

{{-- Toggle Password Visibility --}}
<script>
    document.querySelectorAll('.toggle-password').forEach(btn => {
        btn.addEventListener('click', function() {
            const target = document.getElementById(this.dataset.target);
            const icon = this.querySelector('i');

            if (target.type === 'password') {
                target.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                target.type = 'password';
                icon.className = 'bi bi-eye';
            }
        });
    });
</script>
@endsection
