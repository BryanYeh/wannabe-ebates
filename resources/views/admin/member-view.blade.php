@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')View Member @endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body p-3 text-center">
                <img class="img-avatar mr-4" src="https://api.adorable.io/avatars/100/{{ str_slug($user->first_name. ' '.$user->last_name) }}.png" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                <div>
                    <div class="text-value-sm text-primary">{{ $user->first_name }} {{ $user->last_name }}</div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">User Information</div>
            <div class="card-body">
                <div>
                    <div class="text-muted"><strong>Name</strong>: {{ $user->first_name }} {{ $user->last_name }}</div>
                    <div class="text-muted"><strong>Email</strong>: {{ $user->email }}</div>
                    <div class="text-muted"><strong>Status</strong>: {{ $user->status ? "Active" : "Disabled" }}</div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Configuration</div>
            <div class="card-body">
                <div>
                    <div class="text-muted"><a href='{{ route("admin.member.edit",["user"=>Hashids::encode($user->id)]) }} '>Edit</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">Trips</div>
            <div class="card-body">
                <table class="table table-bordered table-responsive-sm is-narrow is-hoverable is-fullwidth s-8">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Store</th>
                        <th>Cashback</th>
                        <th>Trip Number</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($clicks as $click)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($click->created_at)->format('n/j/y')}}</td>
                                <td><a href="{{ url("/store/view/{$click->clickable->retailer->slug}") }}">{{$click->clickable->retailer->name}}</a></td>
                                <td></td>
                                <td>{{ $click->trip_number}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection