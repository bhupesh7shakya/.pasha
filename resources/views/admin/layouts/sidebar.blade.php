<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark my-3 fs-1">
            <a href="{{ route('admin.dashboard') }}">
                .Pasha Admin Panel
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item m-2">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/dashboard</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="13" r="2"></circle>
                                <line x1="13.45" y1="11.55" x2="15.5" y2="9.5"></line>
                                <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title fs-2">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-list"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/layout-list</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="4" width="16" height="6" rx="2"></rect>
                                <rect x="4" y="14" width="16" height="6" rx="2"></rect>
                            </svg>
                        </span>
                        <span class="nav-link-title fs-2">
                            Category
                        </span>
                    </a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" href="{{ route('product.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-brand-producthunt" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/brand-producthunt
                                </desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                            </svg>
                        </span>
                        <span class="nav-link-title fs-2">
                            Products
                        </span>
                    </a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" href="{{ route('inventory.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-building-warehouse" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/building-warehouse
                                </desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 21v-13l9 -4l9 4v13"></path>
                                <path d="M13 13h4v8h-10v-6h6"></path>
                                <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title fs-2">
                            Inventory
                        </span>
                    </a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link" href="./index.html">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/shopping-cart</desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="6" cy="19" r="2"></circle>
                                <circle cx="17" cy="19" r="2"></circle>
                                <path d="M17 17h-11v-14h-2"></path>
                                <path d="M6 5l14 1l-1 7h-13"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title fs-2">
                            Orders
                        </span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</aside>
