<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="/dashboard" target="_blank">
        <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">SIMASI</span>
    </a>
</div>
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link  {{ request()->path() == 'dashboard' ? 'active' : '' }} "
                href="{{ route('dashboard.index') }}">
                <div class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-tachometer-alt  text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        @if (session()->get('role') == 'admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'users' ? 'active' : '' }}"
                    href="{{ route('users.index') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'divisions' ? 'active' : '' }}"
                    href="{{ route('divisions.index') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-square text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Divisions</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'members' ? 'active' : '' }}"
                    href="{{ route('members.index') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-square text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Members</span>
                </a>
            </li>
        @endif
        @if (session()->get('role') == 'admin' || session()->get('role') == 'sekretaris')
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'meetings' ? 'active' : '' }}"
                    href="{{ route('meetings.index') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-square text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Meetings</span>
                </a>
            </li>
        @endif
        @if (session()->get('role') == 'admin' || session()->get('role') == 'bendahara')
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'kas' ? 'active' : '' }}"
                    href="{{ route('kas.index') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-square text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'expenses' ? 'active' : '' }}"
                    href="{{ route('expenses.index') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-square text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Expenses</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'transaction_history' ? 'active' : '' }}"
                    href="{{ route('transaction_history.index') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-square text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transaction History</span>
                </a>
            </li>
        @endif
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'profile' ? 'active' : '' }}"
                href="{{ route('profile.index') }}">
                <div class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-user text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('auth.logout') }}">
                <div class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-sign-out-alt text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
        </li>
    </ul>
</div>
<div class="sidenav-footer mx-3 ">
</div>
