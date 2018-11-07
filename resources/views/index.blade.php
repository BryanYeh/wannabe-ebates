@extends('layouts.main')

@section('content')
    @php $page = 'index'; @endphp


    @guest
    <!-- hero -->
    <section class="hero" style="background-image: url('https://picsum.photos/2000/500?image=0&blur');background-color:#fff;">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-three-fifths">
                        <h1 class="title">
                            Get up to 40% Cash Back at over 2,000 stores
                        </h1>
                        <h2 class="subtitle">
                            Stores pay Ebates a commission for sending you their way, and Ebates shares the commission with you as Cash Back.
                        </h2>
                    </div>
                    <div class="column hero-form is-one-third">
                        <h1 class="signup-title">Sign Up and Get a <span class="form-bonus">$10 Bonus</span> Today*</h1>
                        <button class="button is-social facebook-connect is-medium"><i class="fab fa-facebook-f social-logo"></i> Connect with Facebook</button>
                        <a href="{{ url('auth/google') }}"  class="button is-social google-connect is-medium"><i class="fab fa-google social-logo"></i> Connect with Google</a>
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
                            <button class="button btn-green is-medium btn-join width-100" type="submit">Join Now</button>
                        </form>
                        <p class="reminder">By joining, I agree to Ebates’ Terms & Conditions and Privacy Policy.</p>
                        <p class="reminder tooltip is-tooltip-multiline" data-tooltip="To qualify for a Welcome Bonus, you must be a new member and make minimum qualifying purchases totaling 
                                            at least twenty-five dollars ($25) within ninety (90) days of becoming a Member.">*Bonus terms apply <i class="fas fa-info-circle"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- go to store -->
    <section class="section bg-white go-to-store">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h2 class="title">Shop through Ebates at your favorite stores.</h2>
                    <h2 class="subtitle">Start shopping at Ebates.com or the Ebates app and find a store, promo code or deal.</h2>
                </div>
                <div class="column has-text-centered">
                    <img src="https://static.ebates.com/static/images/welcome/how1.1.0.0.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- get cashback on purchases -->
    <section class="section bg-grey cashback-on-purchase">
        <div class="container">
            <div class="columns">
                <div class="column has-text-centered">
                    <img src="https://static.ebates.com/static/images/welcome/how2.1.0.0.png" alt="">
                </div>
                <div class="column">
                    <h2 class="title">Earn Cash Back on your purchases.</h2>
                    <h2 class="subtitle">Follow our links and let the shopping begin. Cash Back will be added to your account when your order is reported to us.</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- withdraw money -->
    <section class="section bg-white withdraw-money">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h2 class="title">Get your Big Fat Check or PayPal payment.</h2>
                    <h2 class="subtitle">Every quarter, we’ll send you your Cash Back in the form of a Big Fat Check or PayPal payment.</h2>
                </div>
                <div class="column has-text-centered">
                    <img src="https://static.ebates.com/static/images/welcome/how3.1.0.0.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- join now -->
    <section class="section bg-green join-now">
        <div class="container">
            <div class="columns">
                <div class="column has-text-centered">
                    <h2 class="title c-white">Join Ebates for Free and Get a $10 Bonus Today*</h2>
                    <a class="button">Join Now</a>
                </div>
            </div>
        </div>
    </section>
    @endguest

    <!-- double cashback sqaure stores (cards) -->
    <section class="section sqaure-cards bg-lgrey">
        <div class="container">
            <h2 class="title">Get Double Cash Back on Shoes &amp; Accessories</h2>
            <div class="columns is-multiline">
                @foreach($sampleStores as $store)
                <div class="column is-12-mobile is-2-desktop is-4-tablet">
                    <a href='{{url("/store/view/{$store->slug}")}}'>
                        <div class="card shadow-hover">
                            <div class="card-image">
                                <figure class="image">
                                    <img src="https://static.ebates.com/image/store/icon/8318/icon-100x27.gif" alt="{{$store->name}}" title="{{$store->name}}">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <p>Was up to 3%</p>
                                    <p>{{$store->cashbacks->first()->amount}}% Cashback</p>
                                    <p>See all {{$store->name}} coupons</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- featured daily deals (cards) -->
    <section class="section tall-cards bg-lgrey">
        <div class="container">
            <h2 class="title">Featured Daily Deals</h2>
            <div class="columns is-mobile is-multiline">
                @foreach($featuredStores as $store)
                <div class="column is-12-mobile is-6-tablet is-one-fifth-desktop">
                    <div class="card has-text-centered shadow-hover">
                        <div class="card-image">
                            <figure class="image">
                                <img src="{{$store->coupons->first()->sale_image}}" alt="{{$store->coupons->first()->title}}">
                            </figure>
                        </div>
                        <div class="card-logo">
                            <img src="{{$store->logo}}" alt="{{$store->name}}" title="{{$store->name}}">
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <p class="c-red w-500">{{$store->cashbacks->first()->amount}}% Cash Back</p>
                                <p class="discount w-500">{{$store->coupons->first()->first()->title}}</p>
                                <p class="s-7"><i class="far fa-clock"></i> Expires {{$store->coupons->first()->end_date->format('m/d/Y')}}</p>
                                <a href='{{url("/store/access/{$store->slug}/campaign/{$store->coupons->first()->uuid}")}}' class="button btn-red">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- -->
    <!-- hot deals -->
    <section class="section bg-lgrey">
        <div class="container">
            <div class="columns">
                <div class="column is-9">
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            {{\Carbon\Carbon::now()->format('l')}}'s Hot Deals
                        </p>
                        @foreach($coupons as $coupon)
                        <div class="panel-block display-block">
                            <div class="columns is-vcentered">
                                <div class="column is-3 has-text-centered">
                                    <img src="{{$coupon->retailer->logo}}" alt="{{$coupon->retailer->name}}" title="{{$coupon->retailer->name}}">
                                </div>
                                <div class="column is-7">
                                    <h2 class="is-size-5 w-500">{{$coupon->title}} <span class="c-red is-size-6">+ Up to {{$coupon->retailer->cashbacks->first()->amount}}% Cash Back</span></h2>
                                    @if($coupon->code)
                                    <p>Code: <span class="tooltip is-tooltip-info c-green w-500 coupon-code" data-tooltip="Copy Code">{{$coupon->code}}</span> 
                                    @endif
                                    <i class="far fa-clock"></i> Expires {{$coupon->first()->end_date->format('m/d/Y')}}</p>
                                </div>
                                <div class="column has-text-centered">
                                    <a href='{{url("/store/access/{$coupon->retailer->slug}/campaign/{$coupon->uuid}")}}' class="button btn-red">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="panel-block display-block has-text-centered">
                            <a class="button btn-green" href="{{url('/coupons')}}">See All Hot Deals</a>
                        </div>
                    </nav>
                </div>
                <div class="column">
                    <nav class="panel top-green bg-white has-text-centered">
                        <p class="panel-heading bg-white c-green w-500">
                            Daily Double
                        </p>
                        <div class="panel-block">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image">
                                            <img src="https://static.ebates.com/image/store/icon/69/icon-100x27.gif" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content has-text-centered">
                                        <p class="title is-7">was 3.0%</p>
                                        <p class="subtitle is-6">6.0% Cash Back</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    @foreach($ads300x250 as $ad)
                    <div class="ad-300-250">
                        <a href="{{url("/store/access/{$ad->retailer->slug}/campaign/{$ad->uuid}")}}">
                            <img src="{{$ad->image}}" alt="{{$ad->title}}" title="{{$ad->title}}">
                            <p>Shop {{$ad->retailer->name}} with {{$ad->retailer->cashbacks->first()->amount}}% Cash Back </p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section short-terms bg-lgrey">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="s-7 has-text-centered">
                        <p>
                            * To qualify for a Welcome Bonus, you must be a new member and make minimum qualifying purchases totaling at least twenty-five dollars ($25) within ninety (90) days of becoming a Member.
                        </p>
                        <p>
                            By becoming a member, you agree to our Terms & Conditions.<br> All trademarks are proprietary to Ebates Inc.<br> ©1998-2018 Ebates Inc. All rights reserved. Privacy Policy<br>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section discover-by-join has-text-centered bg-grey-6 has-text-white">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h2 class="is-size-3">Discover even more deals with Cash Back</h2>
                    <p class="is-size-6 m-b-1">Start earning Cash Back at over 2,000 of the biggest stores and specialty boutiques.</p>
                    <a class="button btn-green m-b-1" href="#">Join Now</a>
                    <p><a class="has-text-white" href="#">Member Sign In</a></p>
                </div>
            </div>
        </div>
    </section>


@endsection
