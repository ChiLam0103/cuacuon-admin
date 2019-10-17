<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">
        <ul class="nav">
            <!-- <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">
                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li> -->
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-cogs nav-icon"></i>
                    Sản phẩm
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ url('admin/products') }}"
                            class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon"></i>
                            Tất cả
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/types') }}"
                            class="nav-link {{ request()->is('admin/types') || request()->is('admin/types/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon"></i>
                            Loại sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/ranges')  }}"
                            class="nav-link {{ request()->is('admin/ranges') || request()->is('admin/ranges/*') ? 'active' : '' }}">
                            <i class="fas fa-expand-arrows-alt nav-icon"></i>
                            Độ tương thích
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-newspaper nav-icon"></i>
                    Tin tức
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ url('admin/news') }}"
                            class="nav-link {{ request()->is('admin/news') || request()->is('admin/news/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon"></i>
                            Tất cả
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/new_types') }}"
                            class="nav-link {{ request()->is('admin/new_types') || request()->is('admin/new_types/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs nav-icon"></i>
                            Loại tin tức
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}"
                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fas fa-user nav-icon"></i>
                    Người dùng
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/quotations')  }}"
                    class="nav-link {{ request()->is('admin/quotations') || request()->is('admin/quotations/*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart nav-icon"></i>
                    Đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/brands')  }}"
                    class="nav-link {{ request()->is('admin/brands') || request()->is('admin/brands/*') ? 'active' : '' }}">
                    <i class="far fa-copyright nav-icon"></i>
                    Thương hiệu
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/contacts') }}"
                    class="nav-link {{ request()->is('admin/contacts') || request()->is('admin/contacts/*') ? 'active' : '' }}">
                    <i class="fas fa-file-contract nav-icon"></i>
                    Liên hệ
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/warranty_types') }}"
                    class="nav-link {{ request()->is('admin/warranty_types') || request()->is('admin/warranty_types/*') ? 'active' : '' }}">
                    <i class="fas fa-check-square nav-icon"></i>
                    Bảo hành
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/seo_tags') }}"
                    class="nav-link {{ request()->is('admin/seo_tags') || request()->is('admin/seo_tags/*') ? 'active' : '' }}">
                    <i class="fas fa-tags nav-icon"></i>
                    Thẻ seo
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/home_banners') }}"
                    class="nav-link {{ request()->is('admin/home_banners') || request()->is('admin/home_banners/*') ? 'active' : '' }}">
                    <i class="far fa-images  nav-icon"></i>
                    Ảnh bìa trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/statistics') }}"
                    class="nav-link {{ request()->is('admin/statistics') || request()->is('admin/statistics/*') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar nav-icon"></i>
                    Số liệu thống kê
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">
                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>