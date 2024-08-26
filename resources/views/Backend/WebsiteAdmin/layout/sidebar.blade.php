<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- <li>
                    <a href="index.html"><img src="{{ asset('assets/admin/assets/img/icons/dashboard.svg') }}"
                            alt="img"><span>
                            Dashboard</span> </a>
                </li> --}}
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/plus-circle.svg') }}"
                            alt="img"><span>
                            Category</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/category/all" class="{{ request()->is('admin/dashboard/category/all') ? 'active' : '' }}">Category List</a>
                        </li>
                        <li>
                            <a href="/admin/dashboard/category/add" class="{{ request()->is('admin/dashboard/category/add') ? 'active' : '' }}">Add Category</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/dollar-square.svg') }}"
                            alt="img"><span>
                            Tax</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/tax/all" class="{{ request()->is('admin/dashboard/tax/all') ? 'active' : '' }}">Tax List</a>
                        </li>
                        <li>
                            <a href="/admin/dashboard/tax/add" class="{{ request()->is('admin/dashboard/tax/add') ? 'active' : '' }}">Add Tax</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/cash.svg') }}"
                            alt="img"><span>
                            Promo Code</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/promocode/all" class="{{ request()->is('admin/dashboard/promocode/all') ? 'active' : '' }}">Promo Code List</a>
                        </li>
                        <li>
                            <a href="/admin/dashboard/promocode/add" class="{{ request()->is('admin/dashboard/promocode/add') ? 'active' : '' }}">Add Promo Code</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/product.svg') }}"
                            alt="img"><span>
                            Products</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/product/all" class="{{ request()->is('admin/dashboard/product/all') ? 'active' : '' }}">Product List</a>
                        </li>
                        <li>
                            <a href="/admin/dashboard/product/add" class="{{ request()->is('admin/dashboard/product/add') ? 'active' : '' }}">Add Product</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/purchase1.svg') }}"
                            alt="img"><span>
                            Combinations</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/product/combination/all" class="{{ request()->is('admin/dashboard/product/combination/all') ? 'active' : '' }}">Combination List</a>
                        </li>
                        <li>
                            <a href="/admin/dashboard/product/combination/add" class="{{ request()->is('admin/dashboard/product/combination/add') ? 'active' : '' }}">Add Combination</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/edit-6.svg') }}"
                            alt="img"><span>
                            Blogs</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/blog/all" class="{{ request()->is('admin/dashboard/blog/all') ? 'active' : '' }}">Blog List</a>
                        </li>
                        <li>
                            <a href="/admin/dashboard/blog/add" class="{{ request()->is('admin/dashboard/blog/add') ? 'active' : '' }}">Add Blog</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/sales1.svg') }}"
                            alt="img"><span>
                            Orders</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/order/all" class="{{ request()->is('admin/dashboard/order/all') ? 'active' : '' }}">Orders List</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/users1.svg') }}"
                            alt="img"><span>
                            Users</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/user/all" class="{{ request()->is('admin/dashboard/user/all') ? 'active' : '' }}">User List</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/ellipise1.svg') }}"
                            alt="img"><span>
                            Order ID Format</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/order-id-format/edit" class="{{ request()->is('/admin/dashboard/order-id-format/edit') ? 'active' : '' }}">Order ID Format</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('assets/admin/assets/img/icons/users1.svg') }}"
                            alt="img"><span>
                            Sale Day</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="/admin/dashboard/saleday/users/all" class="{{ request()->is('/admin/dashboard/saleday/users/all') ? 'active' : '' }}">Users</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
