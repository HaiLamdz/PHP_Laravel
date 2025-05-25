<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('assets/BE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('assets/BE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

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
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}"
            class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">QUẢN LÝ</li>
        <li class="nav-item {{ Request::routeIs('admin.product.list', 'admin.product.create', 'admin.product.edit', 'admin.product.show', 'admin.product.trash.list') ? 'menu-open' : '' }}">
          <a href="#"  data-bs-toggle="collapse"
            class="nav-link {{ Request::routeIs('admin.product.list', 'admin.product.create', 'admin.product.edit', 'admin.product.show', 'admin.product.trash.list') ? 'active' : '' }}"  >
            <i class="nav-icon fas fa-th"></i>
            <p>
              Sản Phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.product.list') }}"
                class="nav-link {{ Request::routeIs('admin.product.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.product.create') }}"
                class="nav-link {{ Request::routeIs('admin.product.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.product.trash.list') }}"
                class="nav-link {{ Request::routeIs('admin.product.trash.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng Rác</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::routeIs('admin.banner.list', 'admin.banner.create', 'admin.banner.edit', 'admin.banner.show', 'admin.banner.trash.list') ? 'menu-open' : '' }}">
          <a href="#" 
            class="nav-link {{ Request::routeIs('admin.banner.list', 'admin.banner.create', 'admin.banner.edit', 'admin.banner.show', 'admin.banner.trash.list') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Banner
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.banner.list') }}"
                class="nav-link {{ Request::routeIs('admin.banner.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách banner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.banner.create') }}"
                class="nav-link {{ Request::routeIs('admin.banner.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Banner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.banner.trash.list') }}"
                class="nav-link {{ Request::routeIs('admin.banner.trash.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng Rác</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::routeIs('admin.contact.trash.list','admin.contact.list', 'admin.contact.create', 'admin.contact.edit', 'admin.contact.show') ? 'menu-open' : '' }}">
          <a href="#" 
            class="nav-link {{ Request::routeIs('admin.contact.trash.list', 'admin.contact.list', 'admin.contact.create', 'admin.contact.edit', 'admin.contact.show') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Liên Hệ
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.contact.list') }}"
                class="nav-link {{ Request::routeIs('admin.contact.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách liên hệ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.contact.create') }}"
                class="nav-link {{ Request::routeIs('admin.contact.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm liên hệ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.contact.trash.list') }}"
                class="nav-link {{ Request::routeIs('admin.contact.trash.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng Rác</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::routeIs('admin.customer.list', 'admin.customer.create', 'admin.customer.edit', 'admin.customer.show','admin.customer.trash.list') ? 'menu-open' : '' }}">
          <a href="#" 
            class="nav-link {{ Request::routeIs('admin.customer.list', 'admin.customer.create', 'admin.customer.edit', 'admin.customer.show', 'admin.customer.trash.list') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Khách Hàng
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.customer.list') }}"
                class="nav-link {{ Request::routeIs('admin.customer.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách khách hàng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.customer.create') }}"
                class="nav-link {{ Request::routeIs('admin.customer.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm khách hàng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.customer.trash.list') }}"
                class="nav-link {{ Request::routeIs('admin.customer.trash.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng Rác</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::routeIs('admin.post.trash.list', 'admin.post.list', 'admin.post.create', 'admin.post.edit', 'admin.post.show') ? 'menu-open' : '' }}">
          <a href="#"  
            class="nav-link {{ Request::routeIs('admin.post.trash.list', 'admin.post.list', 'admin.post.create', 'admin.post.edit', 'admin.post.show') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Bài Viết
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.post.list') }}"
                class="nav-link {{ Request::routeIs('admin.post.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách Bài Viết</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.post.create') }}"
                class="nav-link {{ Request::routeIs('admin.post.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Bài Viết</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.post.trash.list') }}"
                class="nav-link {{ Request::routeIs('admin.post.trash.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng Rác</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::routeIs('admin.review.trash.list', 'admin.review.list', 'admin.review.create', 'admin.review.edit', 'admin.review.show') ? 'menu-open' : '' }}">
          <a href="#" 
            class="nav-link {{ Request::routeIs('admin.review.trash.list', 'admin.review.list', 'admin.review.create', 'admin.review.edit', 'admin.review.show') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Đánh Giá
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.review.list') }}"
                class="nav-link {{ Request::routeIs('admin.review.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách Đánh Giá</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.review.create') }}"
                class="nav-link {{ Request::routeIs('admin.review.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Đánh Giá</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.review.trash.list') }}"
                class="nav-link {{ Request::routeIs('admin.review.trash.list') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng Rác</p>
              </a>
            </li>
          </ul>
          <ul class="nav">
            <li class="nav-item">
              <hr>
              <form action="{{route('logout')}}" method="post">
                @csrf
                  <button style="margin-left: 30px" type="submit" class=" btn btn-danger">Đăng Xuất</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>