<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Cashback') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-divider@1.0.1/dist/bulma-divider.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@1.0.14/bulma-tooltip/dist/bulma-tooltip.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <meta name="google-signin-client_id" content="615498483665-pgc8885qajotk4gl14vlfg07c6ai1tkq.apps.googleusercontent.com">
</head>

<body class="{{$page}}">
    <!-- top header -->
    <section class="top-header">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a class="navbar-item" href="https://bulma.io">
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

        <!-- top nav -->
        <section class="topnav">
        <div class="container">
            <nav class="navbar">
                <div id="bottomnav" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="https://bulma.io/">
                      Home
                    </a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="/documentation/overview/start/">
                        Docs
                      </a>
                            <div class="navbar-dropdown is-boxed">
                                <a class="navbar-item" href="/documentation/overview/start/">
                          Overview
                        </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                          Modifiers
                        </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                          Columns
                        </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                          Layout
                        </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
                          Form
                        </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                          Elements
                        </a>
                                <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
                          Components
                        </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    @yield('content')

    <!-- footer -->
    <footer class="section footer bg-grey-3">
        <div class="footer-content">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-fifth">
                        <ul>
                            <li class="list-title">
                                Partner Sites
                            </li>
                            <li>
                                <a class="" href="#">Canada</a>
                            </li>
                            <li>
                                <a class="" href="#">Korea</a>
                            </li>
                            <li>
                                <a class="" href="#">Japan</a>
                            </li>
                            <li>
                                <a class="" href="#">BFAds</a>
                            </li>
                            <li>
                                <a class="" href="#">Cartera</a>
                            </li>
                            <li>
                                <a class="" href="#">Shopular</a>
                            </li>
                            <li>
                                <a class="" href="#">ShopStyle</a>
                            </li>
                            <li>
                                <a class="" href="#">Shop at Ebates</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-one-fifth">
                        <ul>
                            <li class="list-title">
                                About
                            </li>
                            <li>
                                <a class="" href="#">Canada</a>
                            </li>
                            <li>
                                <a class="" href="#">Korea</a>
                            </li>
                            <li>
                                <a class="" href="#">Japan</a>
                            </li>
                            <li>
                                <a class="" href="#">BFAds</a>
                            </li>
                            <li>
                                <a class="" href="#">Cartera</a>
                            </li>
                            <li>
                                <a class="" href="#">Shopular</a>
                            </li>
                            <li>
                                <a class="" href="#">ShopStyle</a>
                            </li>
                            <li>
                                <a class="" href="#">Shop at Ebates</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-one-fifth">
                        <ul>
                            <li class="list-title">
                                APPS, TOOLS &amp; SERVICES
                            </li>
                            <li>
                                <a class="" href="#">Canada</a>
                            </li>
                            <li>
                                <a class="" href="#">Korea</a>
                            </li>
                            <li>
                                <a class="" href="#">Japan</a>
                            </li>
                            <li>
                                <a class="" href="#">BFAds</a>
                            </li>
                            <li>
                                <a class="" href="#">Cartera</a>
                            </li>
                            <li>
                                <a class="" href="#">Shopular</a>
                            </li>
                            <li>
                                <a class="" href="#">ShopStyle</a>
                            </li>
                            <li>
                                <a class="" href="#">Shop at Ebates</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-one-fifth">
                        <ul>
                            <li class="list-title">
                                TRENDING STORES
                            </li>
                            <li>
                                <a class="" href="#">Canada</a>
                            </li>
                            <li>
                                <a class="" href="#">Korea</a>
                            </li>
                            <li>
                                <a class="" href="#">Japan</a>
                            </li>
                            <li>
                                <a class="" href="#">BFAds</a>
                            </li>
                            <li>
                                <a class="" href="#">Cartera</a>
                            </li>
                            <li>
                                <a class="" href="#">Shopular</a>
                            </li>
                            <li>
                                <a class="" href="#">ShopStyle</a>
                            </li>
                            <li>
                                <a class="" href="#">Shop at Ebates</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-one-fifth">
                        <ul>
                            <li class="list-title">
                                POPULAR COUPON CODES
                            </li>
                            <li>
                                <a class="" href="#">Canada</a>
                            </li>
                            <li>
                                <a class="" href="#">Korea</a>
                            </li>
                            <li>
                                <a class="" href="#">Japan</a>
                            </li>
                            <li>
                                <a class="" href="#">BFAds</a>
                            </li>
                            <li class="list-title">
                                Seasonal Pages
                            </li>
                            <li>
                                <a class="" href="#">Shopular</a>
                            </li>
                            <li>
                                <a class="" href="#">ShopStyle</a>
                            </li>
                            <li>
                                <a class="" href="#">Shop at Ebates</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-social-media has-text-centered">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <ul>
                            <li>
                                <a href=""><i class="fas fa-rss"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fas fa-indent"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-snapchat-ghost"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright has-text-centered">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <p>© 2018 Ebates Inc. All rights reserved. 160 Spear Street, 19th Floor, San Francisco, CA 94105</p>
                        <p><a href="#">Ebates is a Rakuten Group company</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal is-form has-text-centered" id="modal-join-form">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">
                    <a class="c-green" href="#" id="switch-signin">Member Sign In</a>
                </p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <h2 class="title">Join Ebates for Free and Get a $10 Bonus Today*</h2>
                <button class="button is-social facebook-connect is-medium"><i class="fab fa-facebook-f social-logo"></i> Join with Facebook</button>
                <a href="{{ url('auth/google') }}" class="button is-social google-connect is-medium"><i class="fab fa-google social-logo"></i> Join with Google</a>
                <p class="reminder">We’ll never post anything without your permission.</p>
                <div class="is-divider" data-content="OR"></div>
                <form action="">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="password" placeholder="Password (6+ Characters)">
                        </div>
                    </div>
                    <button class="button btn-green is-medium wdith-100" type="submit">Join Now</button>
                </form>
            </section>
            <footer class="modal-card-foot">
                <p class="modal-reminder">* To qualify for a Welcome Bonus, you must be a new member and make minimum qualifying purchases totaling at least twenty-five dollars ($25) within ninety (90) days of becoming a Member.<br><br> By becoming a member, you agree to our
                    <a href="#">Terms &amp; Conditions</a>.<br> All trademarks are proprietary to Ebates Inc.<br> &copy; 1998-2018 Ebates Inc. All rights reserved. <a href="#">Privacy Policy<a/></p>
            </footer>
        </div>
    </div>
    <div class="modal is-form has-text-centered" id="modal-signin-form">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Sign In</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <button class="button is-social facebook-connect is-medium"><i class="fab fa-facebook-f social-logo"></i> Join with Facebook</button>
                    <a href="{{ url('auth/google') }}" class="button is-social google-connect is-medium"><i class="fab fa-google social-logo"></i> Join with Google</a>
                    <p class="reminder">We’ll never post anything without your permission.</p>
                    <div class="is-divider" data-content="OR"></div>
                    <form action="">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="password" placeholder="Password (6+ Characters)">
                            </div>
                        </div>
                        <button class="button btn-green is-medium width-100" type="submit">Join Now</button>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <p class="modal-reminder">
                        Not a Member? <a class="c-green" href="#" id="switch-join">Join Now</a>
                </p>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Get all "navbar-burger" elements
            var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach(function($el) {
                    $el.addEventListener('click', function() {

                        // Get the target from the "data-target" attribute
                        var target = $el.dataset.target;
                        var $target = document.getElementById(target);

                        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                        $el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');

                    });
                });
            }

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.coupon-code', {
            target: function(trigger) {
                return trigger;
            }
        });

        function fallbackMessage(action) {
            var actionMsg = '';
            var actionKey = (action === 'cut' ? 'X' : 'C');
            if (/iPhone|iPad/i.test(navigator.userAgent)) {
                actionMsg = 'No support :(';
            } else if (/Mac/i.test(navigator.userAgent)) {
                actionMsg = 'Press ⌘˜-' + actionKey + ' to ' + action;
            } else {
                actionMsg = 'Press Ctrl-' + actionKey + ' to ' + action;
            }
            return actionMsg;
        }

        function updateTooltip(elem, msg, defaultMsg) {
            elem.setAttribute('data-tooltip', msg);
            setTimeout(function() {
                elem.setAttribute('data-tooltip', defaultMsg);
            }, 1000);
        }

        clipboard.on('success', function(e) {
            updateTooltip(e.trigger, 'Copied', 'Copy Code');
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            updateTooltip(e.trigger, fallbackMessage(e.action), 'Copy Code');
        });
    </script>
    <script>
        $('#nav-join').click(
            function() {
                $('#modal-join-form').toggleClass('is-active');
            });

        $('#modal-join-form button.delete').click(
            function() {
                $('#modal-join-form').toggleClass('is-active');
            });

        $('.modal-background').click(
            function() {
                if ($('#modal-join-form').hasClass('is-active')) {
                    $('#modal-join-form').toggleClass('is-active');
                }
            });
    </script>
    <script>
        $('#nav-signin').click(
            function() {
                $('#modal-signin-form').toggleClass('is-active');
            });

        $('#modal-signin-form button.delete').click(
            function() {
                $('#modal-signin-form').toggleClass('is-active');
            });

        $('.modal-background').click(
            function() {
                if ($('#modal-signin-form').hasClass('is-active')) {
                    $('#modal-signin-form').toggleClass('is-active');
                }
            });

        $('#switch-join').click(
            function() {
                $('#modal-signin-form').toggleClass('is-active');
                $('#modal-join-form').toggleClass('is-active');
            });

        $('#switch-signin').click(
            function() {
                $('#modal-signin-form').toggleClass('is-active');
                $('#modal-join-form').toggleClass('is-active');
            });
    </script>

</body>

</html>