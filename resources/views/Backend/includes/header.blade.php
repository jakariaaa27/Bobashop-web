<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img src="{{ url('images/users/'. Auth::user()->photo ) }}" alt="profile"> --}}
                    <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        {{-- <div class="figure mb-3">
                            <img src="{{ url('images/users/'. Auth::user()->photo ) }}" alt="">
                        </div> --}}
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                            <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="{{ route('profile.edit', Auth::user()->users_id) }}" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/change-password') }}" class="nav-link">
                                    <i data-feather="repeat"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i data-feather="log-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>