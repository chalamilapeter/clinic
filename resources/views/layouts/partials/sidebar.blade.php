<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{asset('img/dash_icon.svg')}}" alt="" width="50px">
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="{{asset('img/words.svg')}}" alt="" width="100px">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (auth()->user()->role->name  == 'Admin')
        <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('blank')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Patients</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{(route('blank'))}}">View all</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">New Patient</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Doctors</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{(route('blank'))}}">View all</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">New Doctor</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Diseases</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{(route('blank'))}}">View all</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">New Disease</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Roles</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{(route('blank'))}}">View all</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">New Role</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Labs</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{(route('blank'))}}">View all</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">New Lab</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pharmacies</span>
                </a>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{(route('blank'))}}">View all</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">New Pharmacy</a>
                    </div>
                </div>
            </li>


    @elseif(auth()->user()->role->name  == 'Doctor')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('blank')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="#" >
                <i class="fas fa-fw fa-cog"></i>
                <span>Patients</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Appointments</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" >
                <i class="fas fa-fw fa-wrench"></i>
                <span>Lab Results</span>
            </a>
        </li>

    @elseif(auth()->user()->role->name  == 'Patient')

        <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('blank')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Unscheduled</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Unscheduled visits:</h6>
                        <a class="collapse-item" href="{{(route('blank'))}}">Complaints</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">Diagnosis</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">Results</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">Records</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Appointments</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">(Scheduled)</h6>
                        <a class="collapse-item" href="{{(route('blank'))}}">Complaints</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">Diagnosis</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">Results</a>
                        <a class="collapse-item" href="{{(route('blank'))}}">Records</a>
                    </div>
                </div>
            </li>

    @elseif(auth()->user()->role->name  == 'Lab Technician')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('blank')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="{{route('blank')}}" >
                <i class="fas fa-fw fa-cog"></i>
                <span>Diagnosis</span>
            </a>
        </li>

    @elseif(auth()->user()->role->name  == 'Pharmacian')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('blank')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="{{route('blank')}}" >
                <i class="fas fa-fw fa-cog"></i>
                <span>Prescriptions</span>
            </a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
