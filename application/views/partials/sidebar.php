<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <!-- Replace with your actual logo or relevant icon -->
            <img src="<?= base_url('assets/img/inventory.png'); ?>" alt="Logo" width="40" height="40">
        </div>
        <div class="sidebar-brand-text mx-3">PLZ BISA</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard Section -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Inventaris Section -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/inventaris'); ?>">
            <i class="fas fa-boxes"></i>
            <span>Inventaris</span>
        </a>
    </li>

    <!-- Barang Masuk Section -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/barang_masuk'); ?>">
            <i class="fas fa-arrow-down"></i>
            <span>Barang Masuk</span>
        </a>
    </li>

    <!-- Barang Keluar Section -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/barang_keluar'); ?>">
            <i class="fas fa-arrow-up"></i>
            <span>Barang Keluar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
