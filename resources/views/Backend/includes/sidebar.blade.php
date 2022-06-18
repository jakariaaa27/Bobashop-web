<nav class="sidebar">
    <div class="sidebar-header">
    @foreach($setting as $data)
        <a href="{{ url('admin/dashboard') }}" class="sidebar-brand">
            {{$data->logo_text1}}<span>{{$data->logo_text2}}</span>
        </a>
    @endforeach
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>

            <li class="nav-item">
                <a href="{{ url('admin/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            
            @if(Auth::user()->status == 'admin')
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#area" role="button" aria-expanded="false" aria-controls="area">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="link-title">Area</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="area">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/city') }}" class="nav-link ">List City</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/add/city') }}" class="nav-link ">Add City</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/district') }}" class="nav-link ">List District</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/add/district') }}" class="nav-link ">Add District</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="type">
                    <i class="link-icon" data-feather="type"></i>
                    <span class="link-title">Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="type">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/type') }}" class="nav-link ">List Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/add/type') }}" class="nav-link ">Add New Type</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="user">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Users</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="user">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/users') }}" class="nav-link ">List User</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/add/users') }}" class="nav-link ">Add User</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#dest" role="button" aria-expanded="false" aria-controls="dest">
                    <i class="link-icon" data-feather="map"></i>
                    <span class="link-title">Destination</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="dest">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/destination') }}" class="nav-link ">List Destination</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/post/destination') }}" class="nav-link ">Post New Destination</a>
                        </li>
                    </ul>
                </div>
            </li>

            @if(Auth::user()->status == 'admin')
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#guide" role="button" aria-expanded="false" aria-controls="guide">
                    <i class="link-icon" data-feather="user-plus"></i>
                    <span class="link-title">Manager</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="guide">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/guide') }}" class="nav-link ">List Manager</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/add/guide') }}" class="nav-link ">Add Manager</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="guide">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Setting</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="setting">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/setting/backend') }}" class="nav-link ">Backend Setting</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/setting/frontend') }}" class="nav-link ">Frontend Setting</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>