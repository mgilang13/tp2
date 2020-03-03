 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <img class="admin-logo mt-1" src="<?= base_url('assets/admin/img/admin-logo.png'); ?>">
         </div>
         <div class="sidebar-brand-text ml-3 mt-2" align="left">Admin <sup>Dashboard</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item <?= $menu['dashboard']; ?>">
         <a class="nav-link" href="<?= site_url('admin/dashboard'); ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         General
     </div>

     <!-- Nav Item - Data Pohon -->
     <li class="nav-item <?= $menu['pohon']; ?>">
         <a class="nav-link" href="<?= site_url('admin/pohon'); ?>">
             <i class="fas fa-fw fa-leaf"></i>
             <span>Data Pohon</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Admin Menu
     </div>

     <!-- Nav Item - User Management -->
     <li class="nav-item <?= $menu['user_mgmnt']; ?>">
         <a class="nav-link" href="#">
             <i class="fas fa-fw fa-users"></i>
             <span>User Management</span></a>
     </li>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="<?= site_url('auth/logout'); ?>">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->