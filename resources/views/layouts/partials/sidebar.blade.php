<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{asset('img/dash_icon.svg')}}" alt="" width="60px">
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="{{asset('img/words.svg')}}" alt="" width="90px">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (auth()->user()->role->name  == 'Admin')
        <!-- Nav Item - Dashboard -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->4
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('users.index')}}" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Users</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('diseases.index')}}" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Diseases</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('roles.index')}}" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Roles</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('labs.index')}}" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Labs</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('pharmacies.index')}}" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pharmacies</span>
                </a>

            </li>


    @elseif(auth()->user()->role->name  == 'Doctor')
        <!-- Nav Item - Dashboard -->

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="{{route('doctor.patients.index')}}" >
                <i class="fas fa-fw fa-cog"></i>
                <span>Patients</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('complaints.index')}}">
                <i class="fas fa-syringe"></i>
                <span>Diagnoses</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('diagnosis.index')}}" >
                <i class="fas fa-poll-h"></i>
                <span>Final results</span>
            </a>
        </li>


    @elseif(auth()->user()->role->name  == 'Patient')

        <!-- Nav Item - Dashboard -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="{{route('complaints.index')}}" >
                    <i class="fas fa-volume-up"></i>
                    <span>Complaints</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{route('diagnosis.index')}}" >
                    <i class="fas fa-syringe"></i>
                    <span>Diagnosis</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{route('blank')}}" >
                    <i class="fas fa-poll-h"></i>
                    <span>Results</span>
                </a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link " href="{{route('blank')}}" >--}}
{{--                    <i class="fas fa-database"></i>--}}
{{--                    <span>Records</span>--}}
{{--                </a>--}}
{{--            </li>--}}

    @elseif(auth()->user()->role->name  == 'Lab Technician')
        <!-- Nav Item - Dashboard -->

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link " href="{{route('lab_tech.create')}}" >
                <i class="fas fa-fw fa-cog"></i>
                <span>Diagnosis</span>
            </a>
        </li>

    @elseif(auth()->user()->role->name  == 'Pharmacist')
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
    @else
            <li class="nav-item">
                <a class="nav-link " href="#" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>404</span>
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
