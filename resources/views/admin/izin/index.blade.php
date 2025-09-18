@extends('layouts.admin')

@section('content')
    @push('js')
        <script>
            $(document).ready(function () {
                // Initialize DataTable
                const table = $('#izinTable').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "dom": 'rt<"d-flex justify-content-between align-items-center"lip>',
                    "order": [[0, 'asc']],
                });

                // Custom search functionality
                $('#izinInput').on('keyup', function () {
                    table.search(this.value).draw();
                });

                // Status filter functionality
                $('#statusFilter').on('change', function () {
                    const selectedStatus = $(this).val();

                    if (selectedStatus === '' || selectedStatus === 'Semua Status') {
                        table.column(4).search('').draw();
                    } else {
                        let statusText = '';
                        switch(selectedStatus) {
                            case '1':
                                statusText = 'Belum Diproses';
                                break;
                            case '2':
                                statusText = 'Disetujui';
                                break;
                            case '3':
                                statusText = 'Ditolak';
                                break;
                        }
                        table.column(4).search(statusText).draw();
                    }
                });

                // Clear search when search icon is clicked
                $('.btn-link .bi-search').parent().on('click', function() {
                    $('#izinInput').val('');
                    table.search('').draw();
                });
            });
        </script>
    @endpush
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-light btn-sm" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0">Izin</h5>
        </div>
        <a href="#" class="btn btn-primary">+ Ajukan Izin</a>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="position-relative">
                    <input type="text" class="form-control" id="izinInput" placeholder="Cari pegawai..."
                           style="padding-right: 40px;">
                    <button class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3" type="button">
                        <i class="bi bi-search text-muted"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-select" id="statusFilter" aria-label="Status filter">
                    <option value="">Semua Status</option>
                    <option value="1">Belum Diproses</option>
                    <option value="2">Disetujui</option>
                    <option value="3">Ditolak</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table id="izinTable" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pegawai</th>
                    <th>Tanggal Izin</th>
                    <th>Durasi Izin</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Contoh User 1</td>
                    <td>28/07/2025 03:00</td>
                    <td>1 Hari</td>
                    <td><span class="badge bg-warning">Belum Diproses</span></td>
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
                    <td>Contoh User 2</td>
                    <td>28/07/2025 03:00</td>
                    <td>1 Hari</td>
                    <td><span class="badge bg-success">Disetujui</span></td>
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
                    <td>Contoh User 3</td>
                    <td>27/07/2025 09:00</td>
                    <td>2 Hari</td>
                    <td><span class="badge bg-danger">Ditolak</span></td>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
