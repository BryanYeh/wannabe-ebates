@extends('layouts.main')

@section('content')
    @php $page = 'store-view'; @endphp
    
    <section class="section bg-lgrey">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="card has-text-centered m-b-1">
                        <div class="card-image">
                            <figure class="image pt-1-5">
                                <img class="center-img" src="{{$retailer->logo}}" title="Get up to {{$retailer->cashbacks->first()->amount}}% cashback at {{$retailer->name}}" alt="Get up to {{$retailer->cashbacks->first()->amount}}% cashback at {{$retailer->name}}">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <p class="c-red s-20 w-600">{{$retailer->cashbacks->first()->amount}}% Cashback</p>
                                <p>
                                    <a rel="nofollow" target="_blank" href="{{url("/store/access/{$retailer->slug}")}}" class="button btn-red width-100" title="Activate Cashback at {{$retailer->name}}">Shop Now</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content m-b-1">
                            <div class="content">
                                <p class="c-green s-15 w-600">Cashback Terms</p>
                                {{$retailer->conditions}}
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content m-b-1">
                            <div class="content">
                                <p class="c-green s-15 w-600">About {{$retailer->name}}</p>
                                {{$retailer->description}}
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content m-b-1">
                            <div class="content">
                                <p class="c-green s-15 w-600">Cashback Facts</p>
                                <p>
                                    Ebates Members have been cashing in since 1999. Here's what members have earned so far from Charlotte Russe:                                </p>
                                <p class="has-text-centered">
                                    <strong>$141,610</strong><br>Total Cash Back to date
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                        <nav class="panel top-green bg-white">
                            <p class="panel-heading bg-white c-green w-500">
                                Charlotte Russe Coupons, Promo Codes &amp; Cash Back
                            </p>
                            @foreach($coupons as $coupon)
                            <div class="panel-block display-block">
                                <div class="columns is-vcentered">
                                    <div class="column is-10">
                                        <h2 class="is-size-5 w-500">{{$coupon->title}} <span class="s-7">Exp. {{$coupon->first()->end_date->format('m/d/Y')}}</span></h2>
                                        @if($coupon->description)
                                            <p>
                                                {{$coupon->description}}
                                            </p>
                                        @endif
                                        <p class="">
                                            <span class="c-red is-size-6">+ {{$coupon->retailer->cashbacks->first()->amount}}% Cash Back </span>
                                            @if($coupon->code)
                                            Code: <span class="tooltip is-tooltip-info c-green w-500 coupon-code" data-tooltip="Copy Code">{{$coupon->code}}
                                            @endif
                                        </p>
                                        
                                    </div>
                                    <div class="column has-text-centered">
                                        <a rel="nofollow" target="_blank" href='{{url("/store/access/{$coupon->retailer->slug}/campaign/{$coupon->uuid}")}}' class="button btn-red">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </nav>
                </div>
            </div>
        </div>
    </section>
@endsection