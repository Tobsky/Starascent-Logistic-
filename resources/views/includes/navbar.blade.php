<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Star Ascent</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Information
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Staffs</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Staff:</h6>
                <a class="collapse-item" href="{{ url('new_staff') }}">New Staff</a>
                <a class="collapse-item" href="{{ url('staff_list') }}">Staff List</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-warehouse"></i>
            <span>Branch</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Branch Info:</h6>
                <a class="collapse-item" href="{{ url('new_branch') }}">New Branch</a>
                <a class="collapse-item" href="{{ url('list_branch') }}">List Branches</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Parcel Heading -->
    <div class="sidebar-heading">
        Parcel Status
    </div>

    <!-- Nav Item - Parcel Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-truck"></i>
            <span>Parcel</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Status:</h6>
                <a class="collapse-item" href="{{ url('new_parcel') }}">New Parcel</a>
                <a class="collapse-item" href="{{ url('parcel_list') }}">Parcel List</a>
                <a class="collapse-item" href="{{ url('parcel_list/1') }}">Order Accepted  <br> by Courier</a>
                <a class="collapse-item" href="{{ url('parcel_list/2') }}">Collected</a>
                <a class="collapse-item" href="{{ url('parcel_list/3') }}">Shipped</a>
                <a class="collapse-item" href="{{ url('parcel_list/4') }}">In-Transit</a>
                <a class="collapse-item" href="{{ url('parcel_list/5') }}">Arrived at destination</a>
                <a class="collapse-item" href="{{ url('parcel_list/6') }}">Out for Delivery</a>
                <a class="collapse-item" href="{{ url('parcel_list/7') }}">Ready to pick-up</a>
                <a class="collapse-item" href="{{ url('parcel_list/8') }}">Delivered</a>
                <a class="collapse-item" href="{{ url('parcel_list/9') }}">Picked up</a>
                <a class="collapse-item" href="{{ url('parcel_list/10') }}">Unsuccesful Delivery <br> Attempt</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('track') }}">
            <i class="fas fa-search"></i>
            <span>Track Parcel</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('report') }}">
            <i class="fas fa-book-open"></i>
            <span>Generate Report</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                
                <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

            </div>
        </div>
    </div>
</div>
