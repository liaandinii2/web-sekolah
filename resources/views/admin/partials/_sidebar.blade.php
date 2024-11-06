<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="/admin"
                                aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Menu</span>
                    </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('petugas.index') }}"
                                aria-expanded="false">
                                <i data-feather="users" class="feather-icon"></i>
                                <span
                                    class="hide-menu"> MANAJEMEN ADMIN
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('kategori.index') }}"
                                aria-expanded="false">
                                <i data-feather="layers" class="feather-icon"></i>
                                <span
                                    class="hide-menu"> KATEGORI
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('posts.index') }}"
                                aria-expanded="false">
                                <i data-feather="list" class="feather-icon"></i>
                                <span
                                    class="hide-menu"> POST
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('galeri.index') }}"
                                aria-expanded="false">
                                <i data-feather="image" class="feather-icon"></i>
                                <span
                                    class="hide-menu"> GALERI
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('foto.index') }}"
                                aria-expanded="false">
                                <i data-feather="camera" class="feather-icon"></i>
                                <span
                                    class="hide-menu"> FOTO
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
