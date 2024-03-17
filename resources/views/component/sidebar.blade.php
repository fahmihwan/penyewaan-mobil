<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-secondary">
        <img src="{{ asset('logo/logo.png') }}" alt="" width="70">
        <span class="brand-text font-weight-light"> Sewa Mobil</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pl-2 pb-3 mb-3 d-flex">
            <div class=" bg-white d-flex  align-items-center justify-content-center rounded-pill" style="width: 34px;">
                <i class="far fa-user"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ auth()->user()->username }}
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="/beranda" class="nav-link {{ request()->is('beranda*') ? 'active' : '' }}">
                        {{-- <i class="fa-solid fa-cart-plus"></i> &nbsp; --}}
                        <i class="fa-solid fa-house"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/transaksi" class="nav-link {{ request()->is('transaksi*') ? 'active' : '' }}">
                        <i class="fa-solid fa-cart-plus"></i>
                        <p>Sewa </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mobil" class="nav-link {{ request()->is('mobil*') ? 'active' : '' }}">
                        <i class="fa-solid fa-car"></i>
                        <p>Mobil Saya</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/riwayat" class="nav-link {{ request()->is('riwayat*') ? 'active' : '' }}">
                        {{-- <i class="fa-solid fa-cart-plus"></i> &nbsp; --}}
                        <i class="fa-solid fa-book"></i>
                        <p>Riwayat Transaksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="/report/peminjaman"
                        class="nav-link {{request()->is('report/peminjaman*') ? 'active' :''}}">
                        <i class="fa-solid fa-cart-plus"></i> &nbsp;
                        <p>Logout</p>
                    </a> --}}

                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout</button>
                    </form>
                </li>

                {{-- <li class="nav-header">Report</li>
                <li class="nav-item">
                    <a href="/report/peminjaman"
                        class="nav-link {{request()->is('report/peminjaman*') ? 'active' :''}}">
                        <i class="fa-solid fa-cart-plus"></i> &nbsp;
                        <p>Peminjaman</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/report/pengembalian"
                        class="nav-link  {{request()->is('report/pengembalian*') ? 'active' :''}}">
                        <i class="fa-solid fa-people-carry-box"></i> &nbsp;
                        <p>Pengembalian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/report/buku" class="nav-link {{request()->is('report/buku*') ? 'active' :''}}">
                        <i class="fa-solid fa-book-open"></i> &nbsp;
                        <p>Buku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/report/anggota" class="nav-link {{request()->is('report/anggota*') ? 'active' :''}}">
                        <i class="fa-solid fa-users"></i> &nbsp;
                        <p>Anggota</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
