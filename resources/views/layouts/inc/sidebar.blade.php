<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset("images/logo.apotek.png") }}" width="40" height="40">
            </span>

            <span class="app-brand-text demo menu-text fw-bold">ApotekKu</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <br>
    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                Dashboard
            </a>
        </li>

        <br><br>

        <li class="menu-item">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                Admin
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('obat.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-first-aid-kit"></i>
                Obat
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('category.index') }}" class="menu-link">
               <i class="menu-icon tf-icons ti ti-folders"></i>
                Kategori
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('suppliers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-truck"></i>
                Suppliers
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('pesanan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-receipt"></i>
                Pesanan
            </a>
        </li>
        <br>

        <li class="menu-item">
            <a href="{{ route('daftarpelanggan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
               Daftar Pelanggan
            </a>
        </li>


    </ul>
</aside>