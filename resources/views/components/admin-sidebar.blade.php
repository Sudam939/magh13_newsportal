<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">
            <img alt="image" src="https://codeit.com.np/storage/01JJ6HWH8RP35HYNCEBFXVYZKF.png" class="header-logo" />
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown {{ Request::routeIs('admin.company.*') ? 'active' : '' }}">
            <a href="{{ route('admin.company.index') }}" class="nav-link"><i
                    class="fas fa-building"></i><span>Company</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('admin.category.*') ? 'active' : '' }}">
            <a href="{{ route('admin.category.index') }}" class="nav-link"><i
                    class="fas fa-tag"></i><span>Category</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('admin.article.*') ? 'active' : '' }}">
            <a href="{{ route('admin.article.index') }}" class="nav-link"><i
                    class="far fa-newspaper"></i><span>Article</span></a>
        </li>

        <li class="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link"><i
                    class="fas fa-file-image"></i><span>Advertise</span></a>
        </li>



        {{-- <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Widgets</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
            </ul>
        </li> --}}
    </ul>
</aside>
