<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.4/b-3.2.5/datatables.min.css" rel="stylesheet" integrity="sha384-6XpFRggENgqyjzajDl+e76Spqk33H96i3/fAf3TVAEGEXGbyuBQFMV8Id0amI58e" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.4/b-3.2.5/datatables.min.js" integrity="sha384-tAtmBHElm2LQzhN4HTR0+9YecfW1tMSASrq0lInT/gkds5VIPzsxNjfRqstPNGvD" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @stack('libJs')
    @stack('css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="{{ session('sidebar_collapsed') ? 'sidebar-collapsed' : '' }}">
<div id="app" class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="p-3 {{ session('sidebar_collapsed') ? 'collapsed' : '' }}">
        <nav class="card">
            <div class="card-body justify-content-between d-flex flex-column">
                <ul class="nav flex-column">
                    <x-sidebar-list-item :icon="'bi-grid'" :title="'Dashboard'" :route="'admin.home'" :route-is="'admin.home'" />
                    <x-sidebar-list-item :icon="'bi-inbox'" :title="'Penugasan'" :route="'admin.penugasan.index'" :route-is="'admin.penugasan.*'" />
                    <x-sidebar-list-item :icon="'bi-people'" :title="'Users'" :route="'admin.users.index'" :route-is="'admin.users.*'" />
                    <x-sidebar-list-item :icon="'bi-clipboard-check'" :title="'Kehadiran'" :route="'admin.kehadiran.index'" :route-is="'admin.kehadiran.*'" />
                    <x-sidebar-list-item :icon="'bi-pause-circle'" :title="'Izin'" :route="'admin.izin.index'" :route-is="'admin.izin.*'" />
                    <x-sidebar-list-item :icon="'bi-arrow-left-right'" :title="'Approval Petugas'" :route="'admin.approval-tugas.index'" :route-is="'admin.approval.*'" />
                    <x-sidebar-list-item :icon="'bi-box'" :title="'Asset'" :route="'admin.assets.index'" :route-is="'admin.asset.*'" />
                </ul>
                <div>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-person me-2"></i> <span class="nav-item-text">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i> <span class="nav-item-text">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>
    </div>

    <!-- Content -->
    <div id="content" class="flex-grow-1 p-3">
        <div class="card shadow-sm mb-3">
            @yield('content')
        </div>
    </div>
</div>
@stack('js')
</body>
</html>
