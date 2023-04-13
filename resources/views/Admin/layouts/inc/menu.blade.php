  <!-- Menu -->

  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
               <img src="{{ asset('admin/assets/img/logo1.png') }}" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Panel</span>
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">System Setting</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Module Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('module.create') }}" class="menu-link">
                        <div data-i18n="Account">create</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('module.index') }}" class="menu-link">
                        <div data-i18n="Notifications">List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Page Builder</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('page.create') }}" class="menu-link">
                        <div data-i18n="Account">create</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('page.index') }}" class="menu-link">
                        <div data-i18n="Notifications">List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-message-square-minus"></i>
                <div data-i18n="Account Settings">Permission Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('permission.create') }}" class="menu-link">
                        <div data-i18n="Account">create</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('permission.index') }}" class="menu-link">
                        <div data-i18n="Notifications">List</div>
                    </a>
                </li>
            </ul>
        </li>
        @can('index-role')
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-mask"></i>
                <div data-i18n="Account Settings">Role Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('role.create') }}" class="menu-link">
                        <div data-i18n="Account">create</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('role.index') }}" class="menu-link">
                        <div data-i18n="Notifications">List</div>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-user'></i>
                <div data-i18n="Account Settings">User Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('user.create') }}" class="menu-link">
                        <div data-i18n="Account">create</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <div data-i18n="Notifications">List</div>
                    </a>
                </li>
            </ul>
        </li>
        @can('index-backup')
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-mask"></i>
                <div data-i18n="Account Settings">Backup Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('backup.create') }}" class="menu-link">
                        <div data-i18n="Account">Store</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('backup.index') }}" class="menu-link">
                        <div data-i18n="Notifications">List</div>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Account Settings">System Setting Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('settings.general') }}" class="menu-link">
                        <div data-i18n="Account">General Setting</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
<!-- / Menu -->
