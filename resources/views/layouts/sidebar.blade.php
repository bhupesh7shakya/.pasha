<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="{{ route('dashboard.index') }}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{route('category.index')}}">
                <i class='bx bxs-category-alt'></i>
                <span class="text">Category</span>
            </a>
        </li>
        <li>
            <a href="{{route('products.index')}}">
                <i class='bx bxl-product-hunt' ></i>
                <span class="text">Product</span>
            </a>
        </li>
        <li>
            <a href="{{ route('inventories.index') }}">
                <i class='bx bx-list-ul' ></i>
                 <span class="text">Inventory</span>
            </a>
        </li>
        <a href="{{route('order.index')}}">
        <li>

            <i class='bx bx-package' ></i>
                <span class="text">Orders</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.logout')}}" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->
