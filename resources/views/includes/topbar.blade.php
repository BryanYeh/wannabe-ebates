<!-- top header -->
<section class="top-header">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ env('APP_URL') }}">
                    <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
                </a>
                <div class="navbar-burger burger" data-target="bottomnav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="topnav" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input" type="text" placeholder="Search Cash Back Stores, coupons and products">
                            </div>
                            <div class="control">
                                <a class="button is-info">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            @guest
                                <p class="control">
                                    <a class="bd-tw-button button" href="#" id="nav-signin">
                                        <span>
                                    Sign In
                                    </span>
                                    </a>
                                </p>
                                <p class="control">
                                    <a class="button btn-green" href="#" id="nav-join">
                                        <span>Join Now</span>
                                    </a>
                                </p>
                            @else
                                <div class="dropdown is-hoverable">
                                    <div class="dropdown-trigger">
                                        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu2">
                                            <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                            <span class="icon is-small">
                                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="dropdown-menu" id="dropdown-menu2" role="menu">
                                        <div class="dropdown-content">
                                            <a href="{{ route('dashboard') }}" class="dropdown-item">
                                                Dashboard
                                            </a>
                                            <a href="{{ route('balance') }}" class="dropdown-item">
                                                Balance
                                            </a>
                                            <a href="{{ route('withdrawal-history') }}" class="dropdown-item">
                                                Withdrawal History
                                            </a>
                                            <a href="{{ route('settings') }}" class="dropdown-item">
                                                Settings
                                            </a>
                                            <a href="{{ route('subscriptions') }}" class="dropdown-item">
                                                Subscriptions
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>