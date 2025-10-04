@extends('layouts.dashboard')

@section('content')
    @push('js')
        <script>
            // Selamat Pagi, Siang, Sore, Malam
            const waktu = () => {
                const hour = new Date().getHours()
                if (hour < 12) return 'Pagi';
                if (hour < 14) return 'Siang';
                if (hour < 18) return 'Sore';
                return 'Malam';
            }
            $('#selamat-datang').text(`Selamat ${waktu()}`);

            // Waktu Server
            const waktuServer = () => new Date().toLocaleString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: false,
                timeZone: 'Asia/Makassar'
            });
            setInterval(() => {
                $('#waktu-server').text(waktuServer());
            }, 1000);
        </script>
    @endpush

    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-light btn-sm" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0">Dashboard</h5>
        </div>
    </div>
    <div class="card-body">
        <div class="row px-3">
            <div class="col-12">
                <div class="mb-3">
                    <div class="mb-3 mb-lg-0">
                        <h1 id="selamat-datang" class="mb-0 h3 ">Selamat</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-3">
                <div class="card bg-secondary border-1">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Jumlah Data Penugasan</h5>
                            <p class="card-text h4 mb-0">{{$penugasan}}</p>
                        </div>
                        <div>
                            <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-3">
                <div class="card bg-secondary border-1">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Approval Penugasan</h5>
                            <p class="card-text h4 mb-0">{{$approval}}</p>
                        </div>
                        <div>
                            <i class="bi bi-check2-square" style="font-size: 3rem;"></i>
                        </div> 
                    </div>
                </div> 
            </div> 
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-3">
                <div class="card bg-secondary border-1">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Izin</h5>
                            <p class="card-text h4 mb-0">{{$izin}}</p>
                        </div>
                        <div>
                            <i class="bi bi-person-check" style="font-size: 3rem;"></i>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-3">
                <div class="card bg-secondary border-1">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Waktu Server</h5>
                            <p id="waktu-server" class="card-text h4 mb-0">00:00:00</p>
                        </div>
                        <div>
                            <i class="bi bi-clock-history" style="font-size: 3rem;"></i>
                        </div> 
                    </div>
                </div>
            </div>

        </div>
        <div class="row p-3">
            <div class="col-12">
                <div class="card bg-secondary border-1">
                    <div class="card-header">
                        <h2 class="fw-bold mb-0 h3">Selamat Datang {{ Auth::user()->nama }}</h2>
                    </div>
                    <div class="card-body">
                        <p>Sistem Informasi Belajar, Berikut Informasi Anda :</p>
                        <ul>
                            <li>Username Anda Adalah : <span class="text-primary">{{ Auth::user()->email }}</span></li>
                            <li>No Telepon Anda Adalah : <span class="text-primary"> @if (Auth::user()->telepon != null ) {{ Auth::user()->telepon }} @else Tidak Ada @endif </span></li>
                            <li>Anda Login Sebagai : <span class="text-primary"> @if (Auth::user()->roles == 'admin' )  Admin @else pegawai @endif</span></li>
                        </ul>
                        <p>Jaga Selalu Username dan Password Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
