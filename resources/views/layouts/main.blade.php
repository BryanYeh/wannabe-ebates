<!DOCTYPE html>
<html>

<head>
    @include('includes.header')
</head>

<body class="{{$page}}">
    @include('includes.topbar')
    @include('includes.topnav')

    @yield('content')

    @include('includes.footerlinks')

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
                <form class="register-form">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="First Name" name="first_name">
                        </div>
                        <p class="help is-danger" id="first_name_error"></p>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="Last Name" name="last_name">
                        </div>
                        <p class="help is-danger" id="last_name_error"></p>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="email" placeholder="Email" name="email">
                        </div>
                        <p class="help is-danger" id="email_error"></p>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="password" placeholder="Password (6+ Characters)" name="password">
                        </div>
                        <p class="help is-danger" id="password_error"></p>
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
                    <form class="login-form">
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

    <!-- Temporary put scripts here -->
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.2/alertify.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".register-form").submit(function(e){
            e.preventDefault();

            var password = $("input[name=password]").val();
            var email = $("input[name=email]").val();
            var first_name = $("input[name=first_name]").val();
            var last_name = $("input[name=last_name]").val();

            $.ajax({
                type:'POST',
                url:'{{ route('register') }}',
                data:{password:password, email:email, first_name:first_name,last_name:last_name},
                success:function(data){
                    //display success message
                    //https://alertifyjs.com/alert.html
                    alertify
                        .alert("You have successfully created an account!", function(){
                            window.location.replace("{{ route('dashboard') }}");
                        });
                },
                error:function(data){
                    $("#first_name_error").html('');
                    $("#last_name_error").html('');
                    $("#email_error").html('');
                    $("#password_error").html('');

                    var response = data.responseJSON;
                    if(response['first_name']) $("#first_name_error").html(response['first_name'][0]);
                    if(response['last_name']) $("#last_name_error").html(response['last_name'][0]);
                    if(response['email']) $("#email_error").html(response['email'][0]);
                    if(response['password']) $("#password_error").html(response['password'][0]);
                }
            });
        });
    </script>
</body>

</html>