@extends('layouts.main')

@section('content')
    @php $page = 'dashboard'; @endphp

    <section class="section bg-grey">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="bg-white border-grey">
                        <div class="has-text-centered p-10">
                            <p class="s-125 p-1">Welcome</p>
                            <p class="s-15 p-1">{{ Auth::user()->first_name }}</p>
                            <p class="s-7 p-1 c-grey">Member Since {{ Auth::user()->created_at->format('m/d/Y') }}</p>
                        </div>
                        <div class="bg-grey has-text-centered p-10">
                            <p>Lifetime Cashback</p>
                            <p>$0.00</p>
                        </div>
                        <div>
                            <ul class="db-routes">
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
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="column">
                    <div class="bg-white border-grey m-b-1">
                        My Cashback Account
                    </div>
                    <div class="bg-white border-grey">
                        My Shopping Trips
                        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                            <thead>
                              <tr>
                                <th>Trip Number</th>
                                <th>Store</th>
                                <th>Date Visited</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($clicks as $click)
                                    <tr>
                                        <td>{{ $click->trip_number}} </td>
                                        <td><a href="{{ url("/store/view/{$click->clickable->retailer->slug}") }}">{{$click->clickable->retailer->name}}</a></td>
                                        <td>{{ \Carbon\Carbon::parse($click->created_at)->format('m/d/Y')}}</td>
                                    </tr>
                                @endforeach
                                @if ($total_clicks > 0)
                                    <tr><td colspan="3"><a href="{{ route('trips') }}">View All Trips</a></td></tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection