<section id="header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a style="text-decoration: none" href="{{ route('home') }}">
                    <p class="mt-2">.pasha</p>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa-solid fa-bars navbar-toggler-icon"></span>
            </button>
            <div class="input-icon" style="position:absolute;left:50%;transform:translateX(-50%) ">
                <form action="{{ route('search-result') }}" method="get">
                    <input type="text" value="{{ isset($_GET['search']) ? $_GET['search'] : null }}"
                        autocomplete="false" name='search' class="form-control form-control-rounded w-"
                        placeholder="Search…" style="width: 500px;">
                </form>
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <desc>Download more icon variants from https://tabler-icons.io/i/search</desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                    </svg>
                </span>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <div class="dropdown">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="addToCart">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/user</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <button type="button" class="btn btn-white" data-bs-toggle="modal"
                                                data-bs-target="#Login">
                                                Sign in
                                            </button>
                                            <button type="button" class="btn btn-white" data-bs-toggle="modal"
                                                data-bs-target="#Signup">
                                                Sign up
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mx-2">
                        <div class="dropdown">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="addToCart">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-shopping-cart-plus" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/shopping-cart-plus
                                    </desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="6" cy="19" r="2"></circle>
                                    <circle cx="17" cy="19" r="2"></circle>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13"></path>
                                    <path d="M15 6h6m-3 -3v6"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">List Of Items</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Change deprecated html tags to text decoration classes (#29604)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <desc>Download more icon variants from
                                                                https://tabler-icons.io/i/star</desc>
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade show modal-blur" id="Login" tabindex="-1" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="LoginLabel">Sign in</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row mx-5 my-4">
                        <div class="col">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="Email">Email</label>
                                    <input type="text" class="form-control" id="Email" placeholder="Email">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="form-label" for="Password">Password</label>
                                    <input type="password" class="form-control" id="Password" placeholder="Password">
                                </div>
                                <br>
                                <button class="form-control btn btn-primary">Login</button>
                            </form>
                            <br>
                            <p class="text-center">Or</p>
                            <a href="{{route('google.redirect')}}" data-onsuccess="onSignIn" class="g-signin2">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-google" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/brand-google</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                                </svg>
                                Login with Google
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade show modal-blur" id="Signup" tabindex="-1" aria-labelledby="Signup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SignupLable">Sign up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row mx-5 my-4">
                        <div class="col">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="Email">Email</label>
                                    <input type="email" class="form-control" id="Email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="Email">Confirm Email</label>
                                    <input type="email" class="form-control" id="Email" placeholder="Confirm Email">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="form-label" for="Password">Password</label>
                                    <input type="password" class="form-control" id="Password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="Password">Confirm Password</label>
                                    <input type="password" class="form-control" id="Password"
                                        placeholder="Confirm Password">
                                </div>
                                <br>
                                <button class="form-control btn btn-primary">Login</button>
                            </form>
                            <br>
                            <p class="text-center">Or</p>
                            <a href="{{route('google.redirect')}}" data-onsuccess="onSignIn" class="g-signin2 btn btn-danger w-100">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-google" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <desc>Download more icon variants from https://tabler-icons.io/i/brand-google</desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                                </svg>
                                Signup with Google
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

