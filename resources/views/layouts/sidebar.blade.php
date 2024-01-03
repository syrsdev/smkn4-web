<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mb-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/kulikoding-text.png') }}" alt="KuliKoding04" style="width: 130px">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/kulikoding-logo.png') }}" alt="KuliKoding04" style="width: 50px">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ $active === 'Dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Konten</li>
            <li class="dropdown {{ $active === 'Post' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-newspaper"></i>
                    <span>Post</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ $subActive === 'Agenda' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('post.index', 'agenda') }}">Agenda</a>
                    </li>
                    <li class="{{ $subActive === 'Artikel' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('post.index', 'artikel') }}">Artikel</a>
                    </li>
                    <li class="{{ $subActive === 'Berita' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('post.index', 'berita') }}">Berita</a>
                    </li>
                    <li class="{{ $subActive === 'Event' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('post.index', 'event') }}">Event</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Sekolah</li>
            @if (Auth::user()->level === 'author')
                <li class="dropdown {{ $active === 'Kesiswaan' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-fire"></i>
                        <span>Kesiswaan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ $subActive === 'Prestasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prestasi.index') }}">Prestasi</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->level === 'admin')
                <li class="dropdown {{ $active === 'Sekolah' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-school"></i>
                        <span>Profil Sekolah</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ $subActive === 'Tentang' ? 'active' : '' }} mb-2">
                            <a class="nav-link" href="{{ route('tentang.edit') }}">Tentang Sekolah</a>
                        </li>
                        <li class="{{ $subActive === 'Sambutan' ? 'active' : '' }} mt-2">
                            <a class="nav-link" href="{{ route('sambutan.edit') }}">Sambutan Kepala Sekolah</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown {{ $active === 'Guru' ? 'active' : '' }}">
                    <a href="{{ route('guru.index') }}" class="nav-link">
                        <i class="fas fa-users-cog"></i>
                        <span>Guru dan Staff</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Jurusan' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-book"></i>
                        <span>Jurusan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ $subActive === 'Bidang' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('bidang.index') }}">Bidang Keahlian</a>
                        </li>
                        <li class="{{ $subActive === 'Program' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('program.index') }}">Program Keahlian</a>
                        </li>
                        <li class="{{ $subActive === 'Konsentrasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('konsentrasi.index') }}">Konsentrasi Keahlian</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown {{ $active === 'Kesiswaan' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-trophy"></i>
                        <span>Kesiswaan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ $subActive === 'Prestasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('prestasi.index') }}">Prestasi</a>
                        </li>
                        <li class="{{ $subActive === 'Ekstrakurikuler' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('ekskul.index') }}">Ekstrakurikuler</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="dropdown {{ $active === 'Alumni' ? 'active' : '' }}">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Profil Alumni</span>
                    </a>
                </li> --}}
                <li class="menu-header">Website</li>
                <li class="dropdown {{ $active === 'Identitas' ? 'active' : '' }}">
                    <a href="{{ route('sekolah.edit') }}" class="nav-link">
                        <i class="fas fa-school"></i>
                        <span>Identitas Sekolah</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'SubNavbar' ? 'active' : '' }}">
                    <a href="{{ route('sub-navbar.index') }}" class="nav-link">
                        <i class="fas fa-project-diagram"></i>
                        <span>Sub Navbar</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Hero' ? 'active' : '' }}">
                    <a href="{{ route('hero.edit') }}" class="nav-link">
                        <i class="fas fa-lightbulb"></i>
                        <span>Hero Konten</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Sosmed' ? 'active' : '' }}">
                    <a href="{{ route('sosmed.index') }}" class="nav-link">
                        <i class="fas fa-link"></i>
                        <span>Sosial Media</span>
                    </a>
                </li>
                <li class="menu-header">Users</li>
                <li class="dropdown {{ $active === 'User' ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="fas fa-user-cog"></i>
                        <span>Kelola User</span>
                    </a>
                </li>
            @endif
            {{-- <li class="menu-header">Bantuan</li>
            <li class="dropdown {{ $active === 'Developer' ? 'active' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fas fa-code"></i>
                    <span>Kontak Developer</span>
                </a>
            </li> --}}
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>
                Home
            </a>
        </div>
    </aside>
</div>