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
                            Cashback History
                        </p>
                        <div class="panel-block display-block">
                            <table class="table is-narrow is-hoverable is-fullwidth s-8">
                                <thead>
                                <tr>
                                    <th>Date / Time</th>
                                    <th>Store</th>
                                    <th>Order Number</th>
                                    <th>Amount</th>
                                    <th>Cashback</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($click->updated_at)->format('n/j/y g:i A')}}</td>
                                            <td>Store</td>
                                            <td>Order Number</td>
                                            <td>${{ $payment->amount }}</>
                                            <td>Cashback</td>
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