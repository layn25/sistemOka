@extends('layouts.admin')

@section('content')
    <script>
        $(document).ready(function () {
            $('#penugasanDataTable').DataTable();
        });
    </script>
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-light btn-sm" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0">Penugasan</h5>
        </div>
        <a href="{{ route('admin.penugasan.create') }}" class="btn btn-primary">+ Buat Penugasan</a>
    </div>
    <div class="card-body">
        <table id="penugasanDataTable" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama Penugasan</th>
                <th>Tanggal Tugas</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Nama Penugasan 1</td>
                <td>28/07/2025 03:00</td>
                <td><span class="badge bg-warning">Belum Mulai</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Nama Penugasan 2</td>
                <td>28/07/2025 03:00</td>
                <td><span class="badge bg-success">Selesai</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Nama Penugasan 3</td>
                <td>28/07/2025 03:00</td>
                <td><span class="badge bg-primary">Berlangsung</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a></li>
                            <li><a class="dropdown-item text-success" href="#"><i class="bi bi-check-circle me-2"></i>Selesai</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Nama Penugasan 4</td>
                <td>28/07/2025 03:00</td>
                <td><span class="badge bg-primary">Berlangsung</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a></li>
                            <li><a class="dropdown-item text-success" href="#"><i class="bi bi-check-circle me-2"></i>Selesai</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Nama Penugasan 5</td>
                <td>28/07/2025 03:00</td>
                <td><span class="badge bg-success">Selesai</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-primary" href="#"><i class="bi bi-check-square me-2"></i>Approval</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Nama Penugasan 6</td>
                <td>28/07/2025 03:00</td>
                <td><span class="badge bg-success">Selesai</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Nama Penugasan 7</td>
                <td>28/07/2025 03:00</td>
                <td><span class="badge bg-primary">Berlangsung</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a></li>
                            <li><a class="dropdown-item text-success" href="#"><i class="bi bi-check-circle me-2"></i>Selesai</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
