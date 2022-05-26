@php
$prefix =Request::route()->getPrefix();
$route =Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    {{-- <img src="{{ route('home') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

    {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->usertype=='Admin')
        <li class="nav-item  has-treeview" {{ ($prefix=='/users')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage User
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('users.view') }}" class="nav-link {{ $route==('users.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>view user</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Profile
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('profiles.view') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>view profile</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('profiles.password.view') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Change password</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item  has-treeview" {{ ($prefix=='/supplier')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Supplier
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('supplier.view') }}" class="nav-link {{ $route==('supplier.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Supplier</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item  has-treeview" {{ ($prefix=='/supplier')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Customers
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('customers.view') }}" class="nav-link {{ $route==('customers.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Customers</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item  has-treeview" {{ ($prefix=='/unit')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Unit
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('unit.view') }}" class="nav-link {{ $route==('unit.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Unit</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item  has-treeview" {{ ($prefix=='/category')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Category
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('category.view') }}" class="nav-link {{ $route==('category.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Category</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item  has-treeview" {{ ($prefix=='/product')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Product
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('product.view') }}" class="nav-link {{ $route==('product.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Product</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item  has-treeview" {{ ($prefix=='/purchase')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Purchase
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('purchase.view') }}" class="nav-link {{ $route==('purchase.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('purchase.pending.list') }}" class="nav-link {{ $route==('purchase.pending.list')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Approval Purchase</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item  has-treeview" {{ ($prefix=='/invoice')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Invoice
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('invoice.view') }}" class="nav-link {{ $route==('invoice.view')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('invoice.pending.list') }}" class="nav-link {{ $route==('invoice.pending.list')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Approval Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('invoice.print.list') }}" class="nav-link {{ $route==('invoice.print.list')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Approval Print</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('invoice.daily.report') }}" class="nav-link {{ $route==('invoice.daily.report')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daily Invoice Report</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item  has-treeview" {{ ($prefix=='/stock')?'menu-open':'' }}>
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Stock
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('stock.report') }}" class="nav-link {{ $route==('stock.report')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock Report</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('stock.report.supplier.wise') }}" class="nav-link {{ $route==('stock.report.supplier.wise')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Supplier/product Wise</p>
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