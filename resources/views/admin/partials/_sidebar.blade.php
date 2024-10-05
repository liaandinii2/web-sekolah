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
                            <a class="sidebar-link" href="{{ route('users.index') }}"
                                aria-expanded="false">
                                <i data-feather="users" class="feather-icon"></i>
                                <span
                                    class="hide-menu">Manajemen Admin</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('categories.index') }}"
                                aria-expanded="false">
                                <i data-feather="layers" class="feather-icon"></i>
                                <span
                                    class="hide-menu">kategori post</span>
                            </a>

                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('posts.index') }}"
                                aria-expanded="false">
                                <i data-feather="list" class="feather-icon"></i>
                                <span
                                    class="hide-menu">post</span>
                            </a>
                        </li>



                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
