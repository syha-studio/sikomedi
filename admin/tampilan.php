<?php
function sidetop(){
echo "<!-- Sidebar -->
<ul class=\"navbar-nav bg-gradient-dark sidebar sidebar-dark accordion\" id=\"accordionSidebar\">
    <!-- Sidebar - Brand -->
    <a class=\"sidebar-brand d-flex align-items-center justify-content-center\" href=\"index.php\">
        <div class=\"sidebar-brand-icon\">
          <i class=\"bi bi-database-fill\"></i>
        </div>
        <div class=\"sidebar-brand-text mx-3 pt-2\"><sup>SI</sup>KOMEDI</div>
    </a>
    <!-- Divider -->
    <hr class=\"sidebar-divider my-0\">
    <!-- Nav Item - Dashboard -->
    <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"index.php\">
          <i class=\"bi bi-speedometer\"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class=\"sidebar-divider\">
    <!-- Heading -->
    <!-- Nav Item - Charts Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseCharts1\"
            aria-expanded=\"true\" aria-controls=\"collapseCharts1\">
            <i class=\"bi bi-toggles\"></i>
            <span>Control Area</span>
        </a>
        <div id=\"collapseCharts1\" class=\"collapse\" aria-labelledby=\"headingCharts\"
            data-parent=\"#accordionSidebar\">
            <div class=\"bg-white py-2 collapse-inner rounded\">
                <h6 class=\"collapse-header\">Control Area :</h6>
                <a class=\"collapse-item\" href=\"control\content\Ccontent.php\">Content</a>
                <a class=\"collapse-item\" href=\"control\member\Cmember.php\">Member</a>
                <a class=\"collapse-item\" href=\"control\latestpost\Cpost.php\">Latest Post</a>
            </div>
        </div>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseCharts2\"
            aria-expanded=\"true\" aria-controls=\"collapseCharts2\">
            <i class=\"bi bi-file-earmark-spreadsheet-fill\"></i>
            <span>Report Area</span>
        </a>
        <div id=\"collapseCharts2\" class=\"collapse\" aria-labelledby=\"headingCharts\"
            data-parent=\"#accordionSidebar\">
            <div class=\"bg-white py-2 collapse-inner rounded\">
                <h6 class=\"collapse-header\">Report Area :</h6>
                <a class=\"collapse-item\" href=\"Rchart.php\">Chart</a>
                <a class=\"collapse-item\" href=\"Rtable.php\">Table</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class=\"sidebar-divider d-none d-md-block\">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class=\"text-center d-none d-md-inline\">
        <button class=\"rounded-circle border-0\" id=\"sidebarToggle\"></button>
    </div>
</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->

<div id=\"content-wrapper\" class=\"d-flex flex-column\">
    <!-- Main Content -->
    <div id=\"content\">
    <!-- Topbar -->
        <nav class=\"navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow\">
            <!-- Sidebar Toggle (Topbar) -->
            <button id=\"sidebarToggleTop\" class=\"btn btn-link d-md-none rounded-circle mr-3\">
                <i class=\"fa fa-bars\"></i>
            </button>
            <!-- Topbar Search -->
            <div class=\"d-sm-flex align-items-center justify-content-between mb-4\">
                <h1 class=\"h3 mb-0 text-gray-800 pt-4 ps-2\">SISTEM KONTROL MEDIA INFORMASI FASILKOM</h1>
            </div>
            <!-- Topbar Navbar -->
            <ul class=\"navbar-nav ml-auto\">
                <div class=\"topbar-divider d-none d-sm-block\"></div>
                <!-- Nav Item - User Information -->
                <li class=\"nav-item dropdown no-arrow\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"userDropdown\" role=\"button\"
                        data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <img class=\"img-profile rounded-circle\"
                            src=\"img/undraw_profile.svg\">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class=\"dropdown-menu dropdown-menu-right shadow animated--grow-in\"
                        aria-labelledby=\"userDropdown\">
                        <a class=\"dropdown-item\" href=\"\" data-toggle=\"modal\" data-target=\"#logoutModal\">
                            <i class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->";
}
