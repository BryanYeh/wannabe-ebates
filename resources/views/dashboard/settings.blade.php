@extends('layouts.main')

@section('content')
    @php $page = 'dashboard-settings'; @endphp

    <section class="section bg-grey">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    @include('includes/sidebar')
                </div>
                <div class="column">
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            Account Settings
                        </p>
                        <div class="panel-block display-block">
                            <div class="columns">
                                <div class="column is-one-fifth w-600">
                                    Email
                                </div>
                                <div class="column">
                                    <p>{{ Auth::user()->email }}</p>
                                    <p><a href="#">Update Email Address</a></p>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-one-fifth w-600">
                                    Password
                                </div>
                                <div class="column">
                                    <p><a href="#">Update Password</a></p>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <nav class="panel top-green bg-white">
                            <p class="panel-heading bg-white c-green w-500">
                                Big Fat Check Settings
                            </p>
                            <div class="panel-block display-block">
                                <div class="columns">
                                    <div class="column is-one-fifth w-600">
                                        Payment Types
                                    </div>
                                    <div class="column">
                                        <div class="control">
                                            <div class="field">
                                                <label class="radio">
                                                    <input type="radio" name="payment">
                                                    Send my Big Fat Check to the name and address specified above
                                                </label>
                                            </div>
                                            <div class="field">
                                                <label class="radio">
                                                    <input type="radio" name="payment">
                                                    Send my Big Fat Payment via PayPal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="control">
                                                <button class="button btn-green">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            Social Media Connections
                        </p>
                        <div class="panel-block display-block">
                            <p class="m-b-1">Connect your social media for extra features.</p>
                            @if(Auth::user()->provider != 'google' || Auth::user()->provider == NULL)
                                <div class="columns">
                                    <div class="column is-one-fifth w-600">
                                        <span class="icon has-text-danger bg-blue p-25">
                                            <i class="fab fa-facebook-f fa-3x c-white"></i>
                                        </span>
                                    </div>
                                    <div class="column">
                                        @if(Auth::user()->provider == 'facebook')
                                            <p class="w-600">You're connected with Facebook</p>
                                            <p><span class='w-600'>{{ Auth::user()->email }}</span> is linked with Ebates </p>
                                        @else
                                            <p class="w-600">Connect with Facebook</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if(Auth::user()->provider != 'facebook' || Auth::user()->provider == NULL)
                                <div class="columns">
                                    <div class="column is-one-fifth w-600">
                                        <span class="icon has-text-danger bg-red p-25">
                                            <i class="fab fa-google-plus-g fa-3x c-white"></i>
                                        </span>
                                    </div>
                                    <div class="column">
                                        @if(Auth::user()->provider == 'google')
                                            <p class="w-600">You're connected with Google</p>
                                            <p><span class='w-600'>{{ Auth::user()->email }}</span> is linked with Ebates </p>
                                        @else
                                            <p class="w-600">Connect with Google</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection