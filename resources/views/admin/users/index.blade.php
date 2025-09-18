@extends('layouts.admin')

@section('content')
    @push('js')
        <script>
            $(document).ready(function () {
                // Initialize DataTable
                const table = $('#usersDataTable').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "language": {
                        "search": "",
                        "searchPlaceholder": "Cari users...",
                    },
                    "dom": 'rt<"d-flex justify-content-between align-items-center"lip>',
                    "order": [[0, 'asc']]
                });

                // Custom search functionality
                $('#searchInput').on('keyup', function () {
                    table.search(this.value).draw();
                });
            });
        </script>
    @endpush
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-light btn-sm" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0">Users</h5>
        </div>
        <div class="d-flex align-items-center gap-3">
            <!-- Search Input -->
            <div class="position-relative">
                <input type="text" class="form-control" id="searchInput" placeholder="Nama User..."
                       style="padding-right: 40px; width: 250px;">
                <button class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3" type="button">
                    <i class="bi bi-search text-muted"></i>
                </button>
            </div>
            <!-- Add User Button -->
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Tambah User</a>
        </div>
    </div>
    <div class="card-body">
        <table id="usersDataTable" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Robertson Budi</td>
                <td>robertson.budi@gmail.com</td>
                <td>081239423567</td>
                <td><span class="badge bg-warning">Pegawai</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Lihat</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Richard Bambang</td>
                <td>richard_bangbang@gmail.com</td>
                <td>088893123453</td>
                <td><span class="badge bg-primary">Admin</span></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Lihat</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Ubah</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Hapus</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
