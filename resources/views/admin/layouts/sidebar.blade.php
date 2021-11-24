<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route("dashboard")}}" class="brand-link" style="height:60px ;padding-top: 15px;">
        <img src="/styles/admin/dist/img/logo.png" alt="UTI Yamaha" class="brand-image">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-top: 20px;">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">

                     <li class="nav-item">
                        <a href="{{route("dashboard")}}" class="nav-link {{areActiveRoutes(['dashboard'])}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('categories.index')}}"
                           class="nav-link" {{areActiveRoutes(['categories.*'])}}>
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('sub-categories.index')}}"
                           class="nav-link" {{areActiveRoutes(['sub-categories.*'])}}>
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>SubCategories</p>
                        </a>
                    </li>

            </ul>
        </nav>
    </div>
</aside>
