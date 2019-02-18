@extends('layouts.main')

@section('content')
    @php $page = 'stores'; @endphp
    
    <section class="section bg-lgrey">
        <div class="container">
            <div class="columns">
                <div class="column is-one-quarter">
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            Refine Stores
                        </p>
                        <div class="panel-block display-block">
                            <p>Categories</p>
                            @foreach($categories as $category)
                            <ul class="db-routes">
                                <a href="{{ route('stores.filter', ['slug' => $category->slug]) }}" class="dropdown-item">
                                    {{$category->name}}
                                </a>
                            </ul>
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="column">
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            @if(isset($current_category)) {{ $current_category }} @else All Stores @endif
                        </p>
                        @foreach($retailers as $retailer)
                        <div class="panel-block display-block">
                            <div class="columns is-vcentered">
                                <div class="column is-half c-green">
                                    {{ $retailer->name }}
                                </div>
                                <div class="column">
                                    {{ $retailer->activeCouponsCount() }} Coupons
                                </div>
                                <div class="column c-red">
                                    {{$retailer->cashbacks->first()->amount}}% Cashback
                                </div>
                                <div class="column has-text-centered">
                                    <a rel="nofollow" target="_blank" href='{{ route("store-view",["slug"=>$retailer->slug]) }}' class="button btn-red">Shop Now</a>
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