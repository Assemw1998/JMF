<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- /var/www/html/planeBee/public/custom/admin/images/planeBeeLogo.png -->
    <a href="#" class="brand-link d-flex justify-content-center">
        <img src={{ asset("") }} alt="JMF Logo" height="100" width="100">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <small class="d-block text-light">{{auth()->user()->full_name}}</small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('super-admin.dashboard.customer-index')}}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('super-admin.dashboard.motorcycles-index')}}" class="nav-link">
                        <i class="nav-icon fa fa-motorcycle"></i>
                        <p>
                            Motorcycles 
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('super-admin.dashboard.brand-index')}}"  class="nav-link">
                                <i class="far fa fa-ellipsis-h"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('super-admin.dashboard.model-index')}}"  class="nav-link">
                                <i class="far fa fa-ellipsis-h"></i>
                                <p>Model</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('super-admin.dashboard.engineType-index')}}"  class="nav-link">
                                <i class="far fa fa-ellipsis-h"></i>
                                <p>Engine Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('super-admin.dashboard.color-index')}}"  class="nav-link">
                                <i class="far fa fa-ellipsis-h"></i>
                                <p>Color</p>
                            </a>
                            <a href="{{ route('super-admin.dashboard.city-index')}}"  class="nav-link">
                                <i class="far fa fa-ellipsis-h"></i>
                                <p>City</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>