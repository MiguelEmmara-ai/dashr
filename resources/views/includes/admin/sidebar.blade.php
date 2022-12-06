<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="avatar flex-shrink-0">
                <img src="https://cdn-icons-png.flaticon.com/512/2369/2369321.png">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Dashr</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <li
            class="menu-item {{ request()->is('profile') ? 'active' : '' }} {{ request()->is('general-settings*') ? 'active' : '' }}">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('general-settings.index') }}" class="menu-link">
                        <div data-i18n="Account">General Settings</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('profile.edit') }}" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Posts</span></li>

        <!-- Posts -->
        <li
            class="menu-item {{ request()->is('posts') ? 'active' : '' }} {{ request()->is('posts/*/*') ? 'active' : '' }}">
            <a href="{{ route('posts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Posts</div>
            </a>
        </li>

        <!-- Create Posts -->
        <li class="menu-item {{ request()->is('posts/create') ? 'active' : '' }}">
            <a href="{{ route('posts.create') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Create Post</div>
            </a>
        </li>

        {{-- Categories --}}
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Categories</span></li>

        <!-- Categories List -->
        <li
            class="menu-item {{ request()->is('admin-categories') ? 'active' : '' }} {{ request()->is('admin-categories/*/*') ? 'active' : '' }}">
            <a href="{{ route('admin-categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Categories</div>
            </a>
        </li>

        <!-- Create Categories -->
        <li class="menu-item {{ request()->is('admin-categories/create') ? 'active' : '' }}">
            <a href="{{ route('admin-categories.create') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Create Categories</div>
            </a>
        </li>

        {{-- Author --}}
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Author</span></li>

        <!-- Auhtor List -->
        <li
            class="menu-item {{ request()->is('authors') ? 'active' : '' }}">
            <a href="{{ route('authors') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Authors</div>
            </a>
        </li>

    </ul>
</aside>
<!-- / Menu -->
