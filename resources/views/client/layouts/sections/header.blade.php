    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ route('home1') }}">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="{{ route('home') }}"
                            class="{{ Route::is('home') || Route::is('home1') ? 'active' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('movie.grid') }}"
                            class="{{ Route::is('movie.grid') ? 'active' : '' }}">movies</a>
                        {{-- <ul class="submenu">
                            <li>
                                <a href="{{ route('movie.grid') }}">Movie Grid</a>
                            </li>
                            <li>
                                <a href="movie-list.html">Movie List</a>
                            </li>
                            <li>
                                <a href="movie-details.html">Movie Details</a>
                            </li>
                            <li>
                                <a href="movie-details-2.html">Movie Details 2</a>
                            </li>
                            <li>
                                <a href="movie-ticket-plan.html">Movie Ticket Plan</a>
                            </li>
                            <li>
                                <a href="movie-seat-plan.html">Movie Seat Plan</a>
                            </li>
                            <li>
                                <a href="movie-checkout.html">Movie Checkout</a>
                            </li>
                            <li>
                                <a href="popcorn.html">Movie Food</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="#0">events</a>
                        {{-- <ul class="submenu">
                            <li>
                                <a href="events.html">Events</a>
                            </li>
                            <li>
                                <a href="event-details.html">Event Details</a>
                            </li>
                            <li>
                                <a href="event-speaker.html">Event Speaker</a>
                            </li>
                            <li>
                                <a href="event-ticket.html">Event Ticket</a>
                            </li>
                            <li>
                                <a href="event-checkout.html">Event Checkout</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="#0">sports</a>
                        {{-- <ul class="submenu">
                            <li>
                                <a href="sports.html">Sports</a>
                            </li>
                            <li>
                                <a href="sport-details.html">Sport Details</a>
                            </li>
                            <li>
                                <a href="sports-ticket.html">Sport Ticket</a>
                            </li>
                            <li>
                                <a href="sports-checkout.html">Sport Checkout</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="#0">pages</a>
                        <ul class="submenu">
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="apps-download.html">Apps Download</a>
                            </li>
                            <li>
                                <a href="sign-in.html">Sign In</a>
                            </li>
                            <li>
                                <a href="sign-up.html">Sign Up</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">blog</a>
                        <ul class="submenu">
                            <li>
                                <a href="blog.html">Blog</a>
                            </li>
                            <li>
                                <a href="blog-details.html">Blog Single</a>
                            </li>
                        </ul>
                    </li>
                    <li class="pr-5 mr-4">
                        <a href="contact.html">contact</a>
                    </li>
                    @if (Route::has('login'))
                        @guest
                            <li class="header-button">
                                <a href="{{ route('login') }}">join us</a>
                            </li>
                        @endguest
                    @endif
                    @if (Route::has('logout'))
                        @auth
                            {{-- <li>
                                <a href="{{ route('logout') }}"><img src="assets/images/avatars/1.png" alt="avatars"></a>
                                <ul class="submenu">
                                    <li><a href="#">@@@</a></li>
                                </ul>
                            </li> --}}
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown pl-5">
                                <a class="nav-link dropdown-toggle hide-arrow d-flex flex-column" href="javascript:void(0);"
                                    data-bs-toggle="dropdown" id="dropdownMenuButton">
                                    <div class="avatar avatar-online">
                                        <img src="assets/images/avatars/1.png" alt class="h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3 pt-1 pr-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="assets/images/avatars/1.png" alt
                                                            class="h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1" style="padding-top: 6px;">
                                                    <span class="fw-semibold d-block" style="font-weight: 600">
                                                        John Doe
                                                    </span>
                                                    <small class="text-muted"
                                                        style="font-weight: 600;color:#a5a3ae;">User</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ Route::has('profile.show') ? route('profile.show') : url('pages/profile-user') }}">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    {{-- @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <li>
                                            <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                                                <i class='ti ti-key me-2 ti-sm'></i>
                                                <span class="align-middle">API Tokens</span>
                                            </a>
                                        </li>
                                    @endif --}}
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                                <span class="flex-grow-1 align-middle">Billing</span>
                                                <span
                                                    class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                                            </span> </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    @if (Auth::check())
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class='ti ti-logout me-2'></i>
                                                <span class="align-middle">Logout</span>
                                            </a>
                                        </li>
                                        <form method="GET" id="logout-form" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    @else
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
                                                <i class='ti ti-login me-2'></i>
                                                <span class="align-middle">Login</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <!--/ User -->
                        @endauth
                    @endif
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="dropdown-overlay"></div>
    </header>
    <!-- ==========Header-Section========== -->
