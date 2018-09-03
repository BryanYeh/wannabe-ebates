@extends('layouts.main')

@section('content')
    @php $page = 'dashboard'; @endphp

    <section class="section bg-grey">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    @include('includes/sidebar')
                </div>
                <div class="column">
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            My Cashback Account
                        </p>
                        <div class="panel-block display-block">
                            <div class="columns is-vcentered">
                                <div class="column is-one-third has-text-centered">
                                    <p class="w-600 s-125">Current Cashback</p>
                                    <p class="s-20 c-green w-600">${{ number_format($current_cashback, 2, '.', ',') }}</p>
                                </div>
                                <div class="is-divider-vertical"></div>
                                <div class="column">
                                    <p class="w-600 s-125">Where's My Cash Back?</p>
                                    <p>Cash Back will be added when a store notifies us of your order. For more details, visit the store page and look under Cash Back Facts.</p>
                                    <p class="c-green"><a href="#">All Stores</a></p>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            Recent Shopping Trips
                        </p>
                        <div class="panel-block display-block">
                            <table class="table is-narrow is-hoverable is-fullwidth s-8">
                                <thead>
                                <tr>
                                    <th>Date / Time</th>
                                    <th>Store</th>
                                    <th>Cashback</th>
                                    <th>Trip Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clicks as $click)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($click->created_at)->format('n/j/y g:i A')}}</td>
                                            <td><a href="{{ url("/store/view/{$click->clickable->retailer->slug}") }}">{{$click->clickable->retailer->name}}</a></td>
                                            <td></td>
                                            <td>{{ $click->trip_number}} </td>
                                        </tr>
                                    @endforeach
                                    @if ($total_clicks > 0)
                                        <tr><td colspan="4"><a href="{{ route('trips') }}">View All Trips</a></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection