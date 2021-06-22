<nav class="lg:scrollbar-thin lg:scrollbar-thumb-custom lg:scrollbar-track-custom-light md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-md bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-3 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-center md:pb-0 text-blueGray-700 pr-9 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            Situs Penggalangan Dana
        </a>
        <div class="visible md:hidden flex-shrink-0 flex items-right">
            <a href="/">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
            </a>
        </div>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block mb-3">
                <div class="flex">
                    <div class="flex-grow flex justify-center">
                        <a class="md:block text-center md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            Situs Penggalangan Dana
                        </a>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <hr class="mb-6 md:min-w-full border-b border-solid border-blueGray-300" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        Dashboard
                    </a>
                </li>

                @can('administrasi_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/agama*")||request()->is("admin/bank*")||request()->is("admin/profesi*")||request()->is("admin/provinsi*")||request()->is("admin/kabupaten*")||request()->is("admin/kecamatan*")||request()->is("admin/kelurahan*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fas fa-database c-sidebar-nav-icon">
                            </i>
                            Administrasi
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('agama_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/agama*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.agama.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bullseye">
                                        </i>
                                        Agama
                                    </a>
                                </li>
                            @endcan
                            @can('bank_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/bank*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.bank.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-university">
                                        </i>
                                        Bank
                                    </a>
                                </li>
                            @endcan
                            @can('profesi_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/profesi*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.profesi.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-md">
                                        </i>
                                        Profesi
                                    </a>
                                </li>
                            @endcan
                            @can('provinsi_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/provinsi*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.provinsi.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-asia">
                                        </i>
                                        Provinsi
                                    </a>
                                </li>
                            @endcan
                            @can('kabupaten_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/kabupaten*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.kabupaten.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-asia">
                                        </i>
                                        Kabupaten
                                    </a>
                                </li>
                            @endcan
                            @can('kecamatan_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/kecamatan*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.kecamatan.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-asia">
                                        </i>
                                        Kecamatan
                                    </a>
                                </li>
                            @endcan
                            @can('kelurahan_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/kelurahan*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.kelurahan.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-asia">
                                        </i>
                                        Kelurahan
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/users*")||request()->is("admin/peran*")||request()->is("admin/perizinan*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            Manajemen Akun
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        Pengguna
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/peran*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.peran.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        Peran
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/perizinan*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.perizinan.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        Perizinan
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('relawan_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/rekening*")||request()->is("admin/program-donasi*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">
                            </i>
                            Relawan
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('rekening_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/rekening*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.rekening.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-money-check">
                                        </i>
                                        Rekening
                                    </a>
                                </li>
                            @endcan
                            @can('program_donasi_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/program-donasi*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.program-donasi.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-hands-helping">
                                        </i>
                                        Program Donasi
                                    </a>
                                </li>
                            @endcan
                            @can('program_donasi_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/program-berita*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.program-berita.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-newspaper">
                                        </i>
                                        Program Berita
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('donasi_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/donasi*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.donasi.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-hand-holding-heart">
                            </i>
                            Donasi
                        </a>
                    </li>
                @endcan
                @can('saran_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/saran*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.saran.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-comment">
                            </i>
                            Saran
                        </a>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.password.edit") }}" class="{{ request()->is("profile/password") || request()->is("profile/password/*") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fas fa-cogs"></i>
                                Ganti Password
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
