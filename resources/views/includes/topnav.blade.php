<!-- top nav -->
<section class="topnav">
    <div class="container">
        <nav class="navbar">
            <div id="bottomnav" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ env('APP_URL') }}">Home</a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="/documentation/overview/start/">All Stores</a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ env('APP_URL') }}">Placeholder Store</a>
                            <a class="navbar-item" href="{{ env('APP_URL') }}">Placeholder Store</a>
                            <a class="navbar-item" href="{{ env('APP_URL') }}">Placeholder Store</a>
                        </div>
                    </div>
                    <a class="navbar-item" href="{{ env('APP_URL') }}">Refer &amp; Earn $$$</a>
                    <a class="navbar-item" href="{{ env('APP_URL') }}">Help</a>
                </div>
            </div>
        </nav>
    </div>
</section>