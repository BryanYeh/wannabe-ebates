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
                    <div class="bg-white border-grey">
                        My Cashback Account
                    </div>
                    <div class="bg-white border-grey">
                        My Shopping Trips
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection