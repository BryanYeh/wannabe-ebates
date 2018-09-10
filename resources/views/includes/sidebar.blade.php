<div class="bg-white border-grey">
    <div class="has-text-centered p-10">
        <p class="s-125 p-1">Welcome</p>
        <p class="s-15">{{ Auth::user()->first_name }}</p>
        <p class="s-7 p-1 c-grey">Member Since {{ Auth::user()->created_at->format('n/j/y') }}</p>
    </div>
    <div class="bg-grey has-text-centered p-10">
        <p>Lifetime Cashback</p>
        <p>${{ number_format(Auth::user()->total_cashback, 2, '.', ',') }}</p>
    </div>
    <div>
        <ul class="db-routes">
            <a href="{{ route('dashboard') }}" class="dropdown-item">
                Dashboard
            </a>
            <a href="{{ route('balance') }}" class="dropdown-item">
                Balance
            </a>
            <a href="{{ route('trips') }}" class="dropdown-item">
                Shoppping Trips
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