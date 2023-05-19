<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Master Data</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}">
          <i class="ri-user-3-line"></i>
          <span>Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::get('service') ? '' : '' }}" href="{{ route('service.index') }}">
          <i class="ri-file-list-line"></i>
          <span>Layanan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('doctor.index') }}">
          <i class="ri-user-add-line"></i>
          <span>Dokter</span>
        </a>
      </li>

      <li class="nav-heading">Pesanan</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('customer.index') }}">
          <i class="ri-user-heart-line"></i>
          <span>Pelanggan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('pet.index') }}">
          <i class="ri-baidu-line"></i>
          <span>Hewan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('order.index') }}">
          <i class="ri-menu-3-line"></i>
          <span>Pesanan</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->