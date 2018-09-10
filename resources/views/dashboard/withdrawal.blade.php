@extends('layouts.main')

@section('content')
    @php $page = 'dashboard-withdrawal'; @endphp

    <section class="section bg-grey">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    @include('includes/sidebar')
                </div>
                <div class="column">
                    <nav class="panel top-green bg-white">
                        <p class="panel-heading bg-white c-green w-500">
                            Withdrawal
                        </p>
                        <div class="panel-block display-block">
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection