@extends('layouts.main')

@section('content')
    @php $page = 'dashboard-trips'; @endphp

    <section class="section bg-grey">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    @include('includes/sidebar')
                </div>
                <div class="column">
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            Shopping Trips
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
                                </tbody>
                            </table>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection